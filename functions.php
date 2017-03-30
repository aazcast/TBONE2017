<?php
/**
 * uniqueGravity Functions page
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */

/*-----------------------------------------------------------------------------------*/
/*  Include Content Width Required by Wordpress
/*-----------------------------------------------------------------------------------*/
if ( ! isset($content_width) ) {
  $content_width = 1180;
}

/*-----------------------------------------------------------------------------------*/
/*  Include Option Tree
/*-----------------------------------------------------------------------------------*/

add_filter( 'ot_show_pages', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( get_template_directory() . '/option-tree/ot-loader.php' );
include_once( get_template_directory() . '/inc/settings/theme-options.php' );

/*-----------------------------------------------------------------------------------*/
/*  Theme setup
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'gravitySetup' ) ) {
  function gravitySetup() { 
    /*-----------------------------------------------------------
      Make theme available for translation
    -----------------------------------------------------------*/
    load_theme_textdomain( 'uniqueGravity', get_template_directory() . '/languages' );
    /*-----------------------------------------------------------
      Add default posts and comments RSS feed links to head
    -----------------------------------------------------------*/
    add_theme_support( 'automatic-feed-links' );
    /*-----------------------------------------------------------
      Enable support for Post Thumbnails on posts and pages
    -----------------------------------------------------------*/
    add_theme_support( 'post-thumbnails' );
    /*-----------------------------------------------------------
      Register menu
    -----------------------------------------------------------*/
    function register_my_menus() {
      register_nav_menus(
        array(
          'primary' => __( 'Main Menu', 'uniqueGravity' ),
        )
      );
    } //End Register Menu Principal
    add_action( 'init', 'register_my_menus' );
    wp_create_nav_menu( __( 'Main Menu', 'uniqueGravity' ), array( 'slug' => 'primary' ) );

    /*-----------------------------------------------------------
      Add theme Support to Widgets
    -----------------------------------------------------------*/
    add_theme_support( 'widgets' );
    /*-----------------------------------------------------------
      Enable support for Title Tag
    -----------------------------------------------------------*/
    add_theme_support( "title-tag" );
  } //End Gravity Setup
}// End IF not exists GRV Setup
add_action( 'after_setup_theme', 'gravitySetup' );


/*-----------------------------------------------------------------------------------*/
/*  Redirect After the theme is activated
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'redirect_after_theme_activation' ) ) {
  function redirect_after_theme_activation (){
    $redirectTo = admin_url().'themes.php?page=ot-theme-options';
    wp_redirect( esc_url($redirectTo) );
  }
  add_action("after_switch_theme", "redirect_after_theme_activation");
} //End Redirect theme after activation


/*-----------------------------------------------------------------------------------*/
/*  Flush Rewrite after the theme is activated
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'rewrite_flush' ) ) {
  function rewrite_flush() {
    flush_rewrite_rules();
  }
  add_action( 'after_switch_theme', 'rewrite_flush' );
} //End Flush Rewrite


/*-----------------------------------------------------------------------------------*/
/*  Include Theme specific functionality
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'gravity_start_files' ) ) { 
  function gravity_start_files() {    
    include_once( get_template_directory() . '/inc/data/header-data.php' );  // Include header data
    include_once( get_template_directory() . '/inc/data/library.php' ); // Include other functions 
    include_once( get_template_directory() . '/inc/data/push-layout.php' ); // Include layouts    
    include_once( get_template_directory() . '/inc/settings/shortcodes.php' );  // Include ShortCodes
    include_once( get_template_directory() . '/inc/widgets/wp-updates-theme.php' );    // Update Notifier
    new WPUpdatesThemeUpdater_1978( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) ); //update start
  }//End gravity_start_files function
  add_action( 'after_setup_theme', 'gravity_start_files' );
}//End IF specific functionality

	if(!function_exists('gravity_excerpt')):
		function gravity_excerpt($limit) {
			$excerpt = explode(' ', get_the_excerpt(), $limit);
			if (count($excerpt)>=$limit) {
				array_pop($excerpt);
				$excerpt = implode(" ",$excerpt);
			} else {
				$excerpt = implode(" ",$excerpt);
			}
			$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
			return $excerpt;
		}
	endif;
?>