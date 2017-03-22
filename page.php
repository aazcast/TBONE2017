<?php
/**
 * uniqueGravity Page Template
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */
?>
<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'post-format/content'); ?>
    <?php endwhile; ?>
    <?php else : ?>
      <?php get_template_part( 'post-format/content', 'none' ); ?>
  <?php endif; ?>
  <?php grv_pagination() ?>
<?php get_footer(); ?>