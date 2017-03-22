<?php  
define( 'THEMEROOT', get_stylesheet_directory_uri() );
// Font Awesome Shortcodes
function addscFontAwesome($atts) {
    extract(shortcode_atts(array(
    'type'  => '',
    'size' => '',
    'rotate' => '',
    'flip' => '',
    'pull' => '',
    'animated' => '',
    'class' => '',
  
    ), $atts));
 
    $classes  = ($type) ? 'fa-'.$type. '' : 'fa-star';
    $classes .= ($size) ? ' fa-'.$size.'' : '';
    $classes .= ($rotate) ? ' fa-rotate-'.$rotate.'' : '';
    $classes .= ($flip) ? ' fa-flip-'.$flip.'' : '';
    $classes .= ($pull) ? ' pull-'.$pull.'' : '';
    $classes .= ($animated) ? ' fa-spin' : '';
    $classes .= ($class) ? ' '.$class : '';
 
    $theAwesomeFont = '<i class="fa '.esc_html($classes).'"></i>';
      
    return $theAwesomeFont;
}
  
add_shortcode('icon', 'addscFontAwesome');
add_filter('widget_text', 'do_shortcode');
require_once get_template_directory() . '/inc/shortcode/init.php';

?>