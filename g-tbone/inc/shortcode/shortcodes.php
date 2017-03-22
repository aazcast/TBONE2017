<?php

/*

 * Shortcodes Class

 */

if ( ! class_exists( 'GRVShortcodes') ) :

class GRVShortcodes {

	public $shortcodes = array(

		"row",

		"two_col",

		"three_col",

		"four_col",

		"six_col",

		"howerini",

		"howerfin",

		"cf",

		"animated",

		"hover"

	 );



	function __construct() {

		add_action( 'init', array( $this, 'add_shortcodes' ) );

		add_filter('the_content', array( $this, 'filter_eliminate_autop' ) );

		add_filter('widget_text', array( $this, 'filter_eliminate_autop' ) );

	}



	/* ***************************************************************

	* **************** Remove AutoP tags *****************************

	* **************************************************************** */

	function filter_eliminate_autop( $content ) {

		$block = join( "|", $this->shortcodes );



		// replace opening tag

		$content = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );



		// replace closing tag

		$content = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)/", "[/$2]", $content );

		return $content;

	}



	/* ***************************************************************

	* **************** Add Shortcodes ********************************

	* **************************************************************** */

	function add_shortcodes() {

		foreach ( $this->shortcodes as $shortcode ) {

			$function_name = 'shortcode_' . $shortcode ;

			add_shortcode( $shortcode, array( $this, $function_name ) );

		}

		// to avoid nested shortcode issue for block

		for ( $i = 1; $i < 10; $i++ ) {

			add_shortcode( 'block' . $i, array( $this,'shortcode_block' ) );

		}

		add_shortcode( 'box', array( $this,'shortcode_block' ) );

	}



	/* ***************************************************************

	* *************** Grid System ************************************

	* **************************************************************** */

	//shortcode row

	function shortcode_row( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="row cf' . esc_attr( $class ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}

	//shortcode two columns

	function shortcode_two_col( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="g-c-1-1 g-c-m-1-2' . esc_attr( $class ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}

	//shortcode three columns

	function shortcode_three_col( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="g-c-1-1 g-c-m-1-3' . esc_attr( $class ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}

	//shortcode four columns

	function shortcode_four_col( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="g-c-1-1 g-c-m-1-4' . esc_attr( $class ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}


	//shortcode six columns

	function shortcode_six_col( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="g-c-1-1 g-c-m-1-6' . esc_attr( $class ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}

	function shortcode_howerini( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="image-hover img-layer-image-hover-2">';

		$result .= do_shortcode( $content );

		return $result;

	}

	function shortcode_howerfin( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="layer"></div></div>';

		$result .= do_shortcode( $content );

		return $result;

	}


	//shortcode cf

	function shortcode_cf( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => ''

		), $atts ) );



		$class = empty( $class )?'':( ' ' . $class );

		$result = '<div class="cf' . esc_attr( $class ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}

	//Shortcode Animated
	function shortcode_animated( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => '',
			'type' => '',
			'duration' => '',
			'delay' => '',
			'anchorplacement' => '',
			'anchor' => ''


		), $atts ) );



		$class = empty( $class )?'':( '' . $class );
		$type = empty( $type )?'':( '' . $type );
		$duration = empty( $duration )?'':( '' . $duration );
		$delay = empty( $delay )?'':( '' . $delay );
		$anchorplacement = empty( $anchorplacement )?'':( '' . $anchorplacement );
		$anchor = empty( $anchor )?'':( '' . $anchor );

		$result = '<div class="'. esc_attr( $class ) . '"data-aos="'. esc_attr( $type ) . '"data-aos-duration="'. esc_attr( $duration ) . '"data-aos-delay="'. esc_attr( $duration ) . '">';

		$result .= do_shortcode( $content );

		$result .= '</div>';

		return $result;

	}

	//Shortcode Hover
	function shortcode_hover( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'class' => '',
			'type' => ''

		), $atts ) );



		$class = empty( $class )?'':( '' . $class );
		$type = empty( $type )?'':( '' . $type );

		$result = '<div class="'.'imageHover-' . esc_attr( $type ) .'"> <div class="image-hover img-layer-image-hover ' . esc_attr( $class ) .'">';

		$result .= do_shortcode( $content );

		$result .= '<div class="layer"></div></div></div>';

		return $result;

	}


}

endif;
