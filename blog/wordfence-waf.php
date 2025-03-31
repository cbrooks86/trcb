<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/sites/therealchrisbrooks.com/files/blog/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/sites/therealchrisbrooks.com/files/blog/wp-content/wflogs/');
	include_once '/sites/therealchrisbrooks.com/files/blog/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>