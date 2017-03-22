<?php
/**
 * uniqueGravity HeaderData
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */


/*-----------------------------------------------------------------------------------*/
/*  Include CSS
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'grv_css_include' ) ) {
  function grv_css_include () { 
    wp_enqueue_style( 'grv-style', get_template_directory_uri() . '/css/main.min.css', array(), 'v1.0', 'all' );
    wp_enqueue_style( 'grv-fonts', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('grv-style'), 'v1.0', 'all' );
    wp_enqueue_style( 'grv-style', get_template_directory_uri() . '/css/vendor/uikit.min.css', array(), 'v1.0', 'all' );
  } //Enf Function grv-css
  add_action( 'wp_enqueue_scripts', 'grv_css_include' );
}//End If GRV CSS FUNCTION


/*-----------------------------------------------------------------------------------*/
/*  Include Java Scripts
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'grv_scripts_include' ) ) { 
  function grv_scripts_include() {
    /*-----------------------------------------------------------
      Vendors
    -----------------------------------------------------------*/
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'grv-main', get_template_directory_uri().'/js/main.min.js', array( 'jquery' ), 'v1.0', 'footer' );
    wp_register_script( 'grv-main', get_template_directory_uri().'/lib/jquery/dist/jquery.js', array( 'jquery' ), 'v1.0', 'footer' );
    wp_register_script( 'grv-main', get_template_directory_uri().'/scripts/vendor/uikit.min.js', array( 'jquery' ), 'v1.0', 'footer' );
    wp_register_script( 'grv-main', get_template_directory_uri().'/scripts/vendor/pls.js', array( 'jquery' ), 'v1.0', 'footer' );
    wp_register_script( 'grv-main', 'https://use.typekit.net/yww3efn.js', array( 'jquery' ), 'v1.0', 'footer' );
    wp_localize_script( 'grv-main', 'ajax_var', array(
      'url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('ajax-nonce')
    ) );
    wp_enqueue_script( 'grv-main' );

  }//End grv-scripts function
  add_action('wp_enqueue_scripts', 'grv_scripts_include');
}//End If grv-scripts


?>