<?php
/**
 * uniqueGravity 404 Template
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */
?>
<?php get_header(); ?>

  <h2><?php _e('Page not found', 'uniqueGravity'); ?></h2><!-- /.main-title -->
  <h2 class="error-subtitle text-center"><?php _e('This page does not exist', 'uniqueGravity'); ?></h2>
  <p class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Go to main page', 'uniqueGravity') ?></a></p>

<?php get_footer(); ?>