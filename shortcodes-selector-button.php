<?php
/*
Plugin Name:     Shortcodes Selector Button
Plugin URI: 	 https://github.com/michaelbontyes/wp-shortcodes-selector-button
Description:     Shortcodes Selector Button Plugin for Wordpress Editor
Version:         0.1
Author:          Michael Bontyes
*/


//  Constants
define( 'SIMPLE_SHORTCODES_PLUGIN_PATH', plugin_dir_path(__FILE__) );

//  Wrapped in after_setup_theme to utilize options
add_action('after_setup_theme', 'shortcodes_selector_button_init');
function shortcodes_selector_button_init(){
    //  Load class
    require_once( SIMPLE_SHORTCODES_PLUGIN_PATH . 'shortcodes-selector-button-class.php' );
}