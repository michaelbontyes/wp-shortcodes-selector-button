<?php
/**
* Shortcodes Selector Button Class.
*
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Shortcodes_Selector_Button_Class' ) ) :

class Shortcodes_Selector_Button_Class {

    function __construct() {

        //  Plugin Activation
        register_activation_hook( __FILE__, array( &$this, 'plugin_activation' ) );

        //  Translation
        load_plugin_textdomain( 'simple', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        //  Shortcodes
        add_action( 'init', array( &$this, 'shortcodes_init' ) );

        //  Load shortcode scripts
        add_action( 'wp_enqueue_scripts', array( &$this, 'load_scripts' ), 10 );

    }

    function shortcodes_init() {

        wp_localize_script( 'jquery', 'Shortcodes_Selector_Button', array('plugin_folder' => plugin_dir_url(__FILE__)) );

        add_filter( "mce_external_plugins", "add_selector_button" );
        add_filter( 'mce_buttons', 'register_selector_button' );

        function add_selector_button( $plugin_array ) {
            $plugin_array['selector_button'] = plugins_url( 'shortcodes.js', __FILE__ );
            return $plugin_array;
        }

        // Register new button in the editor
        function register_selector_button( $buttons ) {
            array_push( $buttons, 'selector_button' );
            return $buttons;
        }

        function shortcodes_selector_button_css() {
            wp_enqueue_style('tinymce-styles', plugins_url( 'style.css', __FILE__) );
        }
        add_action( 'admin_enqueue_scripts', 'shortcodes_selector_button_css' );

        }

}

new Shortcodes_Selector_Button_Class;

endif;