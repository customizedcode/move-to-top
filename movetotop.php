<?php
/**
 * @package Move to top
 * @version 1.1
 */
/*
Plugin Name: Move to top
Plugin URI: http://customizedwebdev.com/movetotop.html
Description: This plugin creates a button at the bottom corner of the page that moves the page to the top of the screen.
Author: Roy Kim
Version: 1.1
Author URI: http://customizedcode.us/
*/

add_action('wp_head','AddFontAwesomeCSS');
add_action('wp_head','AddMoveToTopCSS');
add_filter('the_content','AddMoveToTopButton');
add_action('wp_footer','LoadJQuery');
add_action('wp_footer','AddMoveToTopScript');

function AddFontAwesomeCSS() {
      $cssurl=plugins_url('/assets/fontawesome-5/css/fontawesome-all.min.css',__FILE__);?>
            <link rel="stylesheet" href="<?php echo $cssurl; ?>">
<?php }

function AddMoveToTopCSS() {
   $cssurl=plugins_url('/css/totop.css',__FILE__);?>
        <link rel="stylesheet" href="<?php echo $cssurl; ?>">
<?php }

function AddMoveToTopButton($the_content){
   $new_content = $the_content;
   $new_content .= '<button onclick="topFunction()" id="toTopBtn" title="Go to top"><i class="fas fa-angle-double-up fa-2x"></i></button>'; 
   return $new_content;
}

function LoadJQuery(){
   wp_enqueue_script( 'jquery' );
}

function AddMoveToTopScript() {
   $jsurl=plugins_url('/js/totop.js',__FILE__); ?>
      <script type='text/javascript' src="<?php echo $jsurl; ?>"></script> 
<?php }

