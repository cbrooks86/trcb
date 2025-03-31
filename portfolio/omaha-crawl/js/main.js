/*

	 Snow Tour Main Java Script

	- - - - - Contents - - - - -
	
	
	01 - Basic Java Script
	02 - Plax Move
	03 - Intro Heading Text
	04 - Flip Clock
	05 - Owl Slider
	06 - Gallery Isotope
	07 - Popup Windows
	08 - Gallery Ajax Page
	09 - Blog Masonry
	10 - Blog Ajax Page
	11 - Contact Form


	- - - - - - - - - - - - - -
	
*/


/* 01 - Basic Java Script
-----------------------------------------------------------*/


// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".main-menu").addClass("main-menu-fixed-top");
    } else {
        $(".main-menu").removeClass("main-menu-fixed-top");
    }
});

// Height Fix
$(document).ready(function(){
	$(".main-menu-nav-wrapper").height( 74 );
	$(".main-menu-logo").height( $(".main-menu").height() );
	$(".footer-social").css('padding-bottom', ($(".footer-wrapper").height()-52));
	$(".clock-wrapper").height( $(".intro-info-background").height() );
});

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$(document).on('click','.navbar-collapse.in',function(e) {
	"use strict";
    if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle' ) ) {
        $(this).collapse('hide');
    }

});

/* 02 - Plax Move
-----------------------------------------------------------*/

$(function(){
	"use strict";
	$('.layer-snow').plaxmove({ratioH:0.03,ratioV:0.0})
	$('.layer-sky').plaxmove({ratioH:0.0,ratioV:0.03})
});


/* 03 - Intro Heading Text
-----------------------------------------------------------*/

$('.heading-text').textillate({
  // the default selector to use when detecting multiple texts to animate
  selector: '.heading-text-slider',

  // enable looping
  loop: true,

  // sets the minimum display time for each text before it is replaced
  minDisplayTime: 2000,

  // sets the initial delay before starting the animation
  initialDelay: 0,

  // set whether or not to automatically start animating
  autoStart: true,

    in: {
      effect: 'fadeInLeft',
      delayScale: 1.5,
      delay: 50,
      sync: false,
      reverse: false,
      shuffle: false,
      callback: function () {}
    },
    out: {
      effect: 'fadeOutRight',
      delayScale: 1.5,
      delay: 50,
      sync: false,
      reverse: false,
      shuffle: false,
      callback: function () {}
    },
    autoStart: true,
    inEffects: [],
    outEffects: [ 'fadeOutRight' ]
});


/* 04 - Flip Clock
-----------------------------------------------------------*/

var clock;

// Grab the current date
var currentDate = new Date();

//futureDate = new Date("Aug 2, 2021 09:00:00") // use only first 3 letter of mounth name

futureDate = currentDate.getTime() + 345600000;

// Calculate the difference in seconds between the future and current date
var diff = futureDate / 1000 - currentDate.getTime() / 1000;

// Instantiate a coutdown FlipClock
clock = $('.clock').FlipClock(diff, {
	clockFace: 'DailyCounter', // 'HoursCounter', 'DailyCounter'
	countdown: true,
	showSeconds: true // true - if you use nearest date in HoursCounter.
});


/* 05 - Owl Slider
-----------------------------------------------------------*/

/* Reviews Slider */

$('.reviews-slider').owlCarousel({
    items:1,
	nav:false,
	loop: true,
    smartSpeed:450
});

/* Partners Slider */

$('.partners-slider').owlCarousel({
    items:4,
	margin:30,
	nav:false,
	dots: false,
	loop: true,
    smartSpeed:450,
	navText: [
				'<i class="fa fa-chevron-left"></i>',
				'<i class="fa fa-chevron-right"></i>'
	],
	responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },            
        960:{
            items:2
        },
		992:{
            items:3
        },
        1200:{
            items:4
        }
    }
	
});

var owl = $('.partners-slider');
	owl.owlCarousel();
	// Go to the next item
	$('.partners-slider-next').click(function() {
		owl.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.partners-slider-prev').click(function() {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel');
})


/* 06 - Gallery Isotope
-----------------------------------------------------------*/

$(window).load(function(){
    var $container = $('.gallery-container');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    $('.gallery-filter a').click(function(){
        $('.gallery-filter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});


/* 07 - Popup Windows
-----------------------------------------------------------*/

//	Popup for images
$('.popup').magnificPopup({ 
	type: 'image',
	fixedContentPos: false,
	    gallery: {
      enabled: true
    },

	fixedBgPos: false,
		removalDelay: 800,
		mainClass: 'mfp-fade'

});

// Popup for soundcloud

$('.popup-soundcloud').magnificPopup({ 
	type: 'iframe',
	mainClass: 'soundcloud-popup'
});

// Popup for videos and google maps

$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
	disableOn: 700,
	type: 'iframe',
	fixedContentPos: false,
	fixedBgPos: false,
	mainClass: 'mfp-fade',
	removalDelay: 160,
	preloader: false
});

// Popup for a normal inline element

$('.popup-inline').magnificPopup({
	type: 'inline'
});

// Popup for a project with rich content

$('.popup-project').magnificPopup({
	type: 'inline',
	alignTop: true
});

// Popup for an ajax popup without rich content

$('.popup-ajax').magnificPopup({
	type: 'ajax',
	alignTop: true
});

// no-touch animation

if($('html').hasClass('no-touch')){
	$('.gallery-item, .item-thumbnail').hover(function(){
		$(this).siblings().addClass('fade');
	}, function(){
		$(this).siblings().removeClass('fade');
	});
}


/* 08 - Gallery Ajax Page
-----------------------------------------------------------*/


var   window_height = jQuery(window).height(),
	  loadingError = '<p class="error">The Content cannot be loaded.</p>',
	  target, 
	  hash,
	  url,
	  page,
	  title,	  	  	  
	  GalleryIndex,
	  scrollPostition,
	  GalleryLength,
	  ajaxLoading = false,
	  wrapperHeight,
	  pageRefresh = true,
	  content =false,
	  loader = jQuery('div.loader'),
	  GalleryContainer = jQuery('div#content-ajax'),
	  exitGallery = jQuery('div#closeGallery a'),
	  easing = 'easeOutExpo',
	  folderName ='gallery';	


function runAjaxGallerys(){
	
	'use strict';
	
	jQuery(window).bind( 'hashchange', function() {
	  
	  		 
	hash = jQuery(window.location).attr('hash'); 
	var root = '#!'+ folderName +'/';
	var rootLength = root.length;	
	
		 
	if( hash.substr(0,rootLength) != root ){
		return;						
	} else {	
	
		 var correction = 40;
		 var headerH = jQuery('.navbar').outerHeight()+correction;
		 hash = jQuery(window.location).attr('hash'); 
	     url = hash.replace(/[#\!]/g, '' ); 
		 
	     /* PASTED URL IN ADDRESS BAR */
	     if(pageRefresh == true && hash.substr(0,rootLength) ==  root){	
	
		     jQuery('html,body').stop().animate({scrollTop: (GalleryContainer.offset().top-20)+'px'},800,'easeOutExpo', function(){											
			     loadAjaxGallery();																									  
			 });
				
		 /* Click on Gallery items */
		 }else if(pageRefresh == false && hash.substr(0,rootLength) == root){				
				jQuery('html,body').stop().animate({scrollTop: (GalleryContainer.offset().top-headerH)+'px'},800,'easeOutExpo', function(){ 		
	
				if(content == false){						
					loadAjaxGallery();							
				}else{	
					GalleryContainer.animate({opacity:0,height:wrapperHeight},function(){
					loadAjaxGallery();
					});
				}
						
				exitGallery.fadeOut('100');
					
			});
		
			}else if(hash=='' && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == true){	
				scrollPostition = hash; 
				jQuery('html,body').stop().animate({scrollTop: scrollPostition+'px'},1000,function(){				
								
					deleteGallery();								
								
				});
			}
		}
	  
	});	  
	
	
	/* Ajax Gallery Load */		
	function loadAjaxGallery(){
		loader.fadeIn().removeClass('GalleryError').html('');
		
		if(!ajaxLoading) {				
            ajaxLoading = true;
							
			GalleryContainer.load( url +' div#ajaxpage', function(xhr, statusText, request){
															   
				if(statusText == "success"){				
					ajaxLoading = false;
					page =  jQuery('div#ajaxpage');		

					/* Gallery Page Slider */

					$('.gallery-page-slider').owlCarousel({
					
						items:1,
						nav:true,
						navText: [
						  '',
						  ''
						  ],
						loop: true,
						smartSpeed:450
					});
					
					/* CLOSE Gallery */
					jQuery('#closeGallery a').on('click',function () {
						 
						deleteGallery(jQuery(this).attr('href'));		
						loader.fadeOut();
						return false;
					});
					
					jQuery('#ajaxpage').waitForImages(function() {
						hideLoader();  
					});				  
	
				}
				
				if(statusText == "error"){
					loader.addClass('GalleryError').append(loadingError);
					loader.find('p').slideDown();
				}
		    });
		}
	}
		
	/* Hide loader */	
	function hideLoader(){
		loader.fadeOut('fast', function(){													  
			GalleryItem();					
		});			 
	}	
		
	/* Show Gallery Item */	
	function GalleryItem(){
		if(content==false){
		    wrapperHeight = GalleryContainer.children('div#ajaxpage').outerHeight(true)+'px';
			GalleryContainer.animate({opacity:1,height:wrapperHeight}, function(){

				scrollPostition = jQuery('html,body').scrollTop();
				exitGallery.fadeIn();
				content = true;	
						
			});
				
		}else{
            wrapperHeight = GalleryContainer.children('div#ajaxpage').outerHeight(true)+'px';
			GalleryContainer.animate({opacity:1,height:wrapperHeight}, function(){																		  

				scrollPostition = jQuery('html,body').scrollTop();
				exitGallery.fadeIn();
				
			});					
		}
		
		
	  }
	  
	  function deleteGallery(closeURL){
		  exitGallery.fadeOut(100);				
		  GalleryContainer.animate({opacity:0,height:'0px'});
		  GalleryContainer.empty();
				
		  if(typeof closeURL!='undefined' && closeURL!='') {		  
			  var $anchor = '#gallery';
	
			  $('html, body').stop().animate({
				  scrollTop: $($anchor).offset().top
			  }, 1500, 'easeInOutExpo');
			  event.preventDefault();
			  
			  location = '#_';
		  }
	  }
	pageRefresh = false;	  
};
	 
jQuery(document).ready(function(){ 
	'use strict';
	runAjaxGallerys();
});

jQuery(window).load(function(){
	'use strict';
	jQuery(window).trigger( 'hashchange' );
	jQuery(window).trigger( 'resize' );
	jQuery('[data-spy="scroll"]').each(function () {
    var $spy = jQuery(this).scrollspy('refresh');
	
  }); 	
});


/* 09 - Blog Masonry
-----------------------------------------------------------*/

$(window).resize(function() {
    var $container = $('.blog-posts-wrapper');

    $container.imagesLoaded(function () {
        $container.masonry({
            itemSelector: '.blog-post',
            columnWidth: '.blog-post',
            transitionDuration: 0
        });
    });
});


/* 10 - Blog Ajax Page
-----------------------------------------------------------*/

var   blog_window_height = jQuery(window).height(),
	  loadingError = '<p class="error">The Content cannot be loaded.</p>',
	  target, 
	  hash,
	  url,
	  page,
	  title,	  	  	  
	  BlogIndex,
	  scrollPostition,
	  BlogLength,
	  ajaxLoading = false,
	  blogwrapperHeight,
	  pageRefresh = true,
	  content =false,
	  loader = jQuery('div.loader'),
	  BlogContainer = jQuery('div#blog-content-ajax'),
	  exitBlog = jQuery('div#closeBlog a'),
	  easing = 'easeOutExpo',
	  blogfolderName ='blog';	


function runAjaxBlog(){
	
	'use strict';
	
	jQuery(window).bind( 'hashchange', function() {
	  
	  		 
	hash = jQuery(window.location).attr('hash'); 
	var root = '#!'+ blogfolderName +'/';
	var rootLength = root.length;	
	
		 
	if( hash.substr(0,rootLength) != root ){
		return;						
	} else {	
	
		 var correction = 40;
		 var headerH = jQuery('.navbar').outerHeight()+correction;
		 hash = jQuery(window.location).attr('hash'); 
	     url = hash.replace(/[#\!]/g, '' ); 
		 
	     /* PASTED URL IN ADDRESS BAR */
	     if(pageRefresh == true && hash.substr(0,rootLength) ==  root){	
	
		     jQuery('html,body').stop().animate({scrollTop: (BlogContainer.offset().top-20)+'px'},800,'easeOutExpo', function(){											
			     loadAjaxBlog();																									  
			 });
				
		 /* Click on blog items */
		 }else if(pageRefresh == false && hash.substr(0,rootLength) == root){				
				jQuery('html,body').stop().animate({scrollTop: (BlogContainer.offset().top-headerH)+'px'},800,'easeOutExpo', function(){ 		
	
				if(content == false){						
					loadAjaxBlog();							
				}else{	
					BlogContainer.animate({opacity:0,height:blogwrapperHeight},function(){
					loadAjaxBlog();
					});
				}
						
				exitBlog.fadeOut('100');
					
			});
		
			}else if(hash=='' && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == true){	
				scrollPostition = hash; 
				jQuery('html,body').stop().animate({scrollTop: scrollPostition+'px'},1000,function(){				
								
					deleteBlog();								
								
				});
			}
		}
	  
	});	  
	
	
	/* Ajax Blog Load */		
	function loadAjaxBlog(){
		loader.fadeIn().removeClass('BlogError').html('');
		
		if(!ajaxLoading) {				
            ajaxLoading = true;
							
			BlogContainer.load( url +' div#ajaxpage', function(xhr, statusText, request){
															   
				if(statusText == "success"){				
					ajaxLoading = false;
					page =  jQuery('div#ajaxpage');		

					/* Blog Page Slider */
					
					$('.blog-page-slider').owlCarousel({
					
						items:1,
						nav:true,
						dots: false,
						navText: [
						  '',
						  ''
						  ],
						loop: true,
						smartSpeed:450
					});
										
					/* CLOSE Blog */
					jQuery('#closeBlog a').on('click',function () {
						 
						deleteBlog(jQuery(this).attr('href'));		
						loader.fadeOut();
						return false;
					});
					
					jQuery('#ajaxpage').waitForImages(function() {
						hideLoader();  
					});				  
	
				}
				
				if(statusText == "error"){
					loader.addClass('BlogError').append(loadingError);
					loader.find('p').slideDown();
				}
		    });
		}
	}
		
	/* Hide loader */	
	function hideLoader(){
		loader.fadeOut('fast', function(){													  
			blogItem();					
		});			 
	}	
		
	/* Show blog Item */	
	function blogItem(){
		if(content==false){
		    blogwrapperHeight = BlogContainer.children('div#ajaxpage').outerHeight(true)+'px';
			BlogContainer.animate({opacity:1,height:blogwrapperHeight}, function(){

				scrollPostition = jQuery('html,body').scrollTop();
				exitBlog.fadeIn();
				content = true;	
						
			});
				
		}else{
            blogwrapperHeight = BlogContainer.children('div#ajaxpage').outerHeight(true)+'px';
			BlogContainer.animate({opacity:1,height:blogwrapperHeight}, function(){																		  

				scrollPostition = jQuery('html,body').scrollTop();
				exitBlog.fadeIn();
				
			});					
		}
		
		
	  }
	  
	  function deleteBlog(closeURL){
		  exitBlog.fadeOut(100);				
		  BlogContainer.animate({opacity:0,height:'0px'});
		  BlogContainer.empty();

        

				
		  if(typeof closeURL!='undefined' && closeURL!='') {
			  var $anchor = '#blog';
	
			  $('html, body').stop().animate({
				  scrollTop: $($anchor).offset().top
			  }, 1500, 'easeInOutExpo');
			  event.preventDefault();
			  
			  location = '#_';
							
		  }
	  }
	
	pageRefresh = false;	  
};
	 
jQuery(document).ready(function(){ 
	'use strict';
	runAjaxBlog();
});

jQuery(window).load(function(){
	'use strict';
	jQuery(window).trigger( 'hashchange' );
	jQuery(window).trigger( 'resize' );
	jQuery('[data-spy="scroll"]').each(function () {
    var $spy = jQuery(this).scrollspy('refresh');
	
  }); 	
});


/* 11 - Contact Form
-----------------------------------------------------------*/

/*
Jquery Validation using jqBootstrapValidation
example is taken from jqBootstrapValidation docs 
*/

$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // something to have when submit produces an error ?
            // Not decided if I need it yet
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#name").val();
            var email = $("input#email").val();
            var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "contacts.php",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + " it seems that my mail server is not responding...</strong> Could you please email me directly to <a href='mailto:me@example.com?Subject=Message_Me from myprogrammingblog.com;>me@example.com</a> ? Sorry for the inconvenience!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});


