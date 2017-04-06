<?php
/**
 * Template Name: Bio Page
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>

<?php get_header(); ?>

<div class="headerOtherPage">
      <h1>Biography</h1>
    </div>
    <section class="container">
      <p><?php echo get_field( "biography" ) ?></p>
    </section>
    <section class="moreComponent uk-grid">
      <div class="uk-width-small-1-1 uk-width-medium-1-2"><a href="#">
          <div class="moreComponent-image moreAlb" style="background: url(http://dev.gravity.cr/tboneWP/wp-content/uploads/2017/03/album.jpg)">
            <h2>Albums</h2>
            <div class="moreComponent_bg"></div>
          </div></a></div>
      <div class="uk-width-small-1-1 uk-width-medium-1-2"><a href="#">
          <div class="moreComponent-image moreAlb"  style="background: url(http://dev.gravity.cr/tboneWP/wp-content/uploads/2017/03/gallery.jpg)">
            <h2>Gallery</h2>
            <div class="moreComponent_bg"></div>
          </div></a></div>
    </section>
 
<?php get_footer(); ?>