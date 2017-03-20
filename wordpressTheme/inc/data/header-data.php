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
    wp_enqueue_style( 'grv-style', get_template_directory_uri() . '/css/main.min.css', array(), 'v1.5', 'all' );
    wp_enqueue_style( 'grv-fonts', '//fonts.googleapis.com/css?family=Muli:300,400|Open+Sans:700', array('grv-style'), 'v1.5', 'all' );
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
    wp_register_script( 'grv-main', get_template_directory_uri().'/js/main.min.js', array( 'jquery' ), 'v1.5', 'header' );
    wp_localize_script( 'grv-main', 'ajax_var', array(
      'url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('ajax-nonce')
    ) );
    wp_enqueue_script( 'grv-main' );

  }//End grv-scripts function
  add_action('wp_enqueue_scripts', 'grv_scripts_include');
}//End If grv-scripts


?>