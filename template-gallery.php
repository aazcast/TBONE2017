<?php
/**
 * Template Name: Gallery Page
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>

<?php get_header(); ?>
<div class="galleryPage">
    <div class="headerOtherPage">
      <h1><?php _e('Gallery', 'uniqueGravity'); ?></h1>
    </div>
    <div class="imagesGallery">
      <div data-uk-grid="data-uk-grid">
        <?php 
        $images = get_field('gallery');
        if( $images ): ?>
          <?php foreach( $images as $image ): ?>
            <div class="uk-width-small-2-2 uk-width-medium-1-4 oh">
              <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>