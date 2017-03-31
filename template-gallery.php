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
      <h1>Gallery</h1>
    </div>
    <div class="imagesGallery">
      <div data-uk-grid="data-uk-grid">
        <?php 
        $images = get_field('gallery');
        if( $images ): ?>
            <ul>
                <?php foreach( $images as $image ): ?>
                    <li>
                        <div class="uk-width-small-2-2 uk-width-medium-1-4 oh">
                          <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>