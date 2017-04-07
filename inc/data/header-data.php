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
    wp_enqueue_style( 'grv-vendor', get_template_directory_uri() . '/css/vendor/uikit.min.css', array(), 'v1.0', 'all' );
    wp_enqueue_style( 'grv-style', get_template_directory_uri() . '/css/main.min.css', array('grv-vendor'), 'v2.0.1', 'all' );
    wp_enqueue_style( 'grv-fonts', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('grv-style'), 'v1.0', 'all' );
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
    wp_register_script( 'grv-main', get_template_directory_uri().'/scripts/main.js', array( 'jquery' ), 'v1.5', 'footer' );
    wp_register_script( 'grv-main2', get_template_directory_uri().'/scripts/vendor/uikit.min.js', array( 'jquery' ), 'v1.1', 'footer' );
    wp_register_script( 'grv-main3', get_template_directory_uri().'/scripts/vendor/pls.js', array( 'jquery' ), 'v1.1', 'footer' );
    wp_register_script( 'grv-main4', 'https://use.typekit.net/yww3efn.js', array( 'jquery' ), 'v1.1', 'footer' );
    wp_localize_script( 'grv-main5', 'ajax_var', array(
      'url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('ajax-nonce')
    ) );
    wp_enqueue_script( 'grv-main' );
    wp_enqueue_script( 'grv-main1' );
    wp_enqueue_script( 'grv-main2' );
    wp_enqueue_script( 'grv-main3' );
    wp_enqueue_script( 'grv-main4' );
    wp_enqueue_script( 'grv-main5' );

  }//End grv-scripts function
  add_action('wp_enqueue_scripts', 'grv_scripts_include');
}//End If grv-scripts


?>