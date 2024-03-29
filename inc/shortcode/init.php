<?php
/**
* Shortcode Module Class
*/
if ( ! class_exists( 'GRVShortcodes') ) :
class GRVShortcodeModule {

	function __construct() {
		require_once dirname( __FILE__ ) . '/shortcodes.php';
		$GRV_shortcodes = new GRVShortcodes();
		add_action('init', array( $this, 'add_button' ) );
	}

	function add_button() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
			return;
		}

		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'add_plugin' ) );
			add_filter( 'mce_buttons', array( $this,'register_button' ) );
		}
	}

	function register_button( $buttons ) {
		array_push( $buttons, "|", "GRV_shortcode_button" );
		return $buttons;
	}

	function add_plugin( $plugin_array ) {
		if ( floatval( get_bloginfo( 'version' ) ) >= 3.9 ) {
			$tinymce_js = THEMEROOT . '/inc/shortcode/js/tinymce.js';
		} else {
			$tinymce_js = THEMEROOT . '/inc/shortcode/js/tinymce-legacy.min.js';
		}
		$plugin_array['GRV_shortcode'] = $tinymce_js;
		return $plugin_array;
	}
}
endif;
new GRVShortcodeModule();