(function ($) {
    "use strict";

    /****************************
     * type video
     ***************************/

    $.youtube_parser = function (url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[7].length === 11) {
            return match[7];
        }
        /*jshint latedef: true */
        window.alert("Url Incorrect");
    };

    $.vimeo_parser = function (url) {
        var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
        var match = url.match(regExp);

        if (match) {
            return match[2];
        }

        // check if using https
        regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
        match = url.match(regExp);

        if (match) {
            return match[2];
        }

        /*jshint latedef: true */
        window.alert("not a vimeo url");
    };

    $.type_video_youtube = function (ele, autoplay, repeat) {
        var youtube_id = $.youtube_parser($(ele).attr('data-src'));
        var additionalstring = '';
        var iframe = '';
        if(repeat) {
            additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
            additionalstring += (repeat === true ) ? "loop=1&playlist=" + youtube_id : "";
            iframe = '<iframe width="700" height="500" src="http://www.youtube.com/v/' + youtube_id + '?version=3&' + additionalstring + 'showinfo=0&theme=light&autohide=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
        } else {
            additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
            iframe = '<iframe width="700" height="500" src="http://www.youtube.com/embed/' + youtube_id + '?' + additionalstring + 'showinfo=0&theme=light&autohide=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
        }
        $('.video-container', ele).append(iframe);
    };

    $.type_video_vimeo = function (ele, autoplay, repeat) {
        var vimeo_id = $.vimeo_parser($(ele).attr('data-src'));
        var additionalstring = '';
        additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
        additionalstring += (repeat === true ) ? "loop=1&" : "";
        var iframe = '<iframe src="http://player.vimeo.com/video/' + vimeo_id + '?' + additionalstring + 'title=0&byline=0&portrait=0" width="700" height="500" frameborder="0"></iframe>';
        $('.video-container', ele).append(iframe);
    };

    $.type_soundcloud = function (ele) {
        var soundcloudurl = $(ele).attr('data-src');
        var iframe = '<iframe src="https://w.soundcloud.com/player/?url=' + encodeURIComponent(soundcloudurl) + '" width="700" height="500" frameborder="0"></iframe>';
        $('.video-container', ele).append(iframe);
    };

    $.type_audio = function(ele){
        var musicmp3 = '';
        var musicogg = '';

        if ($(ele).data('mp3') !== '') {
            musicmp3 = "<source type='audio/mpeg' src='" + $(ele).data('mp3') + "' />";
        }

        if ($(ele).data('ogg') !== '') {
            musicogg = "<source type='audio/ogg' src='" + $(ele).data('ogg') + "' />";
        }

        var audio =
            "<audio preload='none' style='width: 100%; visibility: hidden;' controls='controls'>" +
            musicmp3 + musicogg +
            "</audio>";

        $(ele).append(audio);


        var settings = {};

        if ( typeof _wpmejsSettings !== 'undefined' ) {
            settings = _wpmejsSettings;
        }

        settings.success = function (mejs) {
            var autoplay, loop;

            if ( 'flash' === mejs.pluginType ) {
                autoplay = mejs.attributes.autoplay && 'false' !== mejs.attributes.autoplay;
                loop = mejs.attributes.loop && 'false' !== mejs.attributes.loop;

                autoplay && mejs.addEventListener( 'canplay', function () {
                    mejs.play();
                }, false );

                loop && mejs.addEventListener( 'ended', function () {
                    mejs.play();
                }, false );
            }
        };

        $(ele).find('audio').mediaelementplayer( settings );
    };

    $.type_video_html5 = function (ele, autoplay, options, container) {
        var cover = $(ele).data('cover');

        options.pauseOtherPlayers = false;

        var videomp4 = '';
        var videowebm = '';
        var videoogg = '';

        var themesurl = '';

        if ($(ele).data('mp4') !== '') {
            videomp4 = "<source type='video/mp4' src='" + $(ele).data('mp4') + "' />";
        }

        if ($(ele).data('webm') !== '') {
            videowebm = "<source type='video/webm' src='" + $(ele).data('webm') + "' />";
        }

        if ($(ele).data('ogg') !== '') {
            videoogg = "<source type='video/ogg' src='" + $(ele).data('ogg') + "' />";
        }

        var preload = autoplay ? "preload='auto'" : "preload='none'";
        var object = "<object width='100%' height='100%' type='application/x-shockwave-flash' data='" + themesurl + "/public/mediaelementjs/flashmediaelement.swf'>" +
            "<param name='movie' value='" + themesurl + "/public/mediaelementjs/flashmediaelement.swf' />" +
            "<param name='flashvars' value='controls=true&file=" + $(ele).data('mp4') + "' />" +
            "<img src='" + cover + "' alt='No video playback capabilities' title='No video playback capabilities' />" +
            "</object>";
        var iframe = "<video id='player' style='width:100%;height:100%;' width='100%' height='100%' poster='" + cover + "' controls='controls' " + preload + ">" +
            videomp4 + videowebm + videoogg + object +
            "</video>";

        $(container, ele).append(iframe);
        if (autoplay) {
            options.success = function (mediaElement) {
                if (mediaElement.pluginType === 'flash') {
                    mediaElement.addEventListener('canplay', function () {
                        mediaElement.play();
                    }, false);
                } else {
                    mediaElement.play();
                }
            };
        }

        $(ele).find('video').mediaelementplayer(options);
    };


    /****************************
     * Execute function
     ***************************/

    function get_open_menu_width() {
        $(".open-menu > span").show();
        var withhover = $(".open-menu > span").outerWidth();
        $(".open-menu > span").hide();
        return withhover;
    }

    function do_open_menu_hover() {
        var openmenu = $(".open-menu");
        $(openmenu).unbind("mouseenter mouseleave")
            .removeProp('hoverIntent_t')
            .removeProp('hoverIntent_s');

        if($(window).width() > 1024) {
            var menuwidth = get_open_menu_width();

            $(openmenu).hoverIntent(function(){
                $(openmenu).stop().animate({
                    'margin-left' : "-" + menuwidth + "px"
                }, 150, function(){
                    $(".open-menu > span").stop().fadeIn("fast").css("display","inline-block");
                });
            },function(){
                $(".open-menu > span").stop().fadeOut("fast",function(){
                    $(openmenu).stop().animate({'margin-left' : 0}, 150);
                });
            });
        }
    }

    function do_menu_click() {
        var openmenu = $(".open-menu");
        $(openmenu).unbind("click");
        $(".close-overlay").unbind("click");

        if($(window).width() > 1024) {
            $(openmenu).on('click', function(){
                $("body").addClass('hideoverflow');
                $(".sidemenu").show();
                $(".global-overlay").fadeIn(function(){
                    $(".sidemenu").animate({'left': 0});
                    $(".global-viewport").animate({'left' : 50});

                    setTimeout(function(){
                        $(".search-overlay").stop().fadeIn();
                        $(".close-overlay").stop().fadeIn();
                    }, 500);
                });
            });

            $(".close-overlay").on('click', function(){
                $("body").removeClass('hideoverflow');

                $(".search-overlay").stop().fadeOut();
                $(".close-overlay").stop().fadeOut();

                setTimeout(function(){
                    $(".sidemenu").animate({'left': -300});
                    $(".global-viewport").animate({'left' : 0}, function(){
                        $(".global-overlay").fadeOut(function(){
                            $(".sidemenu").hide();
                        });
                    });
                }, 500);
            });
        } else {
            $(openmenu).on('click', function(){
                if($(this).hasClass('down')) {
                    $(this).removeClass('down')
                    $(".sidemenu").stop().slideUp();
                } else {
                    $(this).addClass('down')
                    $(".sidemenu").stop().slideDown();
                }
            });
        }
    }

    function do_menu_hover() {
        var selectormenu = $(".sidenav li.menu-item-has-children");
        $(selectormenu).unbind('click');

        $(selectormenu).unbind("mouseenter mouseleave")
            .removeProp('hoverIntent_t')
            .removeProp('hoverIntent_s');

        if($(window).width() > 1024) {
            $(selectormenu).hoverIntent({
                over: function () {
                    $('.sub-menu', this).first().fadeIn("fast");
                },
                out: function () {
                    $('.sub-menu', this).first().fadeOut("fast");
                },
                timeout: 300
            });
        } else {
            var menuArrow = $('.sidenav li.menu-item-has-children a > i.fa');
            if (menuArrow.length === 0) {
                $('.sidenav li.menu-item-has-children > a').append('<i class="fa fa-angle-down"></i>');
                console.log(menuArrow.length);
            }

            $('.sidenav li.menu-item-has-children a > i.fa').on('click', function(e){
                e.preventDefault();
                var currentselector = $(this).closest('li.menu-item-has-children');

                if($(this).hasClass('down')) {
                    $(this).removeClass('down')
                    $('.sub-menu', currentselector).first().slideUp();
                } else {
                    $(this).addClass('down')
                    $('.sub-menu', currentselector).first().slideDown();
                }

                return false;
            });
        }
    }

    function do_center_menu(){
        var sidelogo = $(".sidelogo").outerHeight();
        var sidefooter = $(".sidefooter").outerHeight();
        var sidenav = $(".sidenav > ul").height();

        var do_center = function(){
            setTimeout(function(){
                var wh = $(window).height();

                var fromtop = ( wh - sidenav ) / 2 - (( sidelogo + sidefooter) / 2);
                if(fromtop < 50) fromtop = 50;
                $(".sidenav").css('margin-top', fromtop);
            }, 200);

        };

        do_center();
        $(window).bind('resize', do_center);
    }

    function do_media_render(){
        // youtube
        if ($("[data-type='youtube']").length) {
            $("[data-type='youtube']").each(function () {
                var autoplay = $(this).data('autoplay');
                var repeat = $(this).data('repeat');
                $.type_video_youtube($(this), autoplay, repeat);
            });
        }

        // vimeo
        if ($("[data-type='vimeo']").length) {
            $("[data-type='vimeo']").each(function () {
                var autoplay = $(this).data('autoplay');
                var repeat = $(this).data('repeat');
                $.type_video_vimeo($(this), autoplay, repeat);
            });
        }

        // sound cloud
        if ($("[data-type='soundcloud']").length) {
            $("[data-type='soundcloud']").each(function () {
                $.type_soundcloud($(this));
            });
        }

        // audio
        if ($("[data-type='audio']").length) {
            $("[data-type='audio']").each(function () {
                $.type_audio($(this));
            });
        }

        // html 5 video
        if($("video").length) {
            $('video').mediaelementplayer();
        }
    }

    function do_gallery_zoom(){
        if($( '.jeg-gallery-thumbnail a').length) {
            $( '.jeg-gallery-thumbnail a').swipebox( {
                useCSS : true, // false will force the use of jQuery for animations
                useSVG : true, // false to force the use of png for buttons
                initialIndexOnArray : 0, // which image index to init when a array is passed
                hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
                hideBarsDelay : 3000, // delay before hiding bars on desktop
                videoMaxWidth : 1140, // videos max width
                beforeOpen: function() {}, // called before opening
                afterOpen: null, // called after opening
                afterClose: function() {}, // called after closing
                loopAtEnd: false // true will return to the first image after the last image is reached
            });
        }
    }

    function do_search_hover(){
        $(".searchnav").hoverIntent({
            over: function () {
                $(this).find('.searchbox').fadeIn("fast");
            },
            out: function () {
                $(this).find('.searchbox').fadeOut("fast");
            },
            timeout: 300
        });
    }

    function do_facebook_widget(){
        if($(".blog-fb-likebox").length){
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml      : true,
                    version    : 'v2.0'
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        }
    }

    function do_ready() {
        do_open_menu_hover();
        do_menu_click();
        do_center_menu();
        do_menu_hover();
        do_search_hover();
        do_media_render();
        do_gallery_zoom();
        do_facebook_widget();

        $(window).bind('resize', function(){
            do_open_menu_hover();
            do_menu_click();
            do_menu_hover();
        });
    }

    $(document).ready(do_ready);

})(jQuery);