<?php
/**
 * Template Name: Home Page Spanish
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>

<?php get_header(); ?>
<?php
  $args = array( 'numberposts' => '1' );
  $recent_posts = wp_get_recent_posts( $args );
  foreach( $recent_posts as $recent ){
    get_permalink($recent["ID"]);
  }
  wp_reset_query();
  $image = wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]), 'single-post-thumbnail' );
  ?>
 <section class="homeLastPost uk-padding-remove uk-position-relative">
      <div style="background-image: url('<?php echo $image[0]; ?>')" class="uk-cover-background uk-position-relative bgHome"><img class="uk-invisible maxH-Home" src="img/bg.jpg"/>
        <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle bgModal">
          <div class="detailsHome">
            <h1><?php echo $recent["post_title"] ?></h1>
            <div class="moreContent">
              <p class="desc"><?php echo $recent["post_content"]?></p>
            </div>
            <a href= "<?php echo get_permalink($recent["ID"])?>">Leer Más</a>
          </div>
        </div>
      </div>
    </section>
    <section class="homeItemsTbone">
      <div data-uk-grid="data-uk-grid">
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div style="<?php echo "background: url(". get_field( "background_bio" ) .")"?>" class="homeItemsTbone_unique bio">
          <a href="http://dev.gravity.cr/tboneWP/biography/">
              <p class="uk-flex">Biografía</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div style="<?php echo "background: url(". get_field( "background_gallery" ) .")"?>" class="homeItemsTbone_unique gallery"><a href="http://dev.gravity.cr/tboneWP/gallery/">
              <p class="uk-flex">Galería</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div style="<?php echo "background: url(". get_field( "background_albums" ) .")"?>" class="homeItemsTbone_unique albums"><a href="http://dev.gravity.cr/tboneWP/album/">
              <p class="uk-flex">Albums</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div class="homeItemsTbone_unique videos"><a href="http://dev.gravity.cr/tboneWP/videos/">
              <p class="uk-flex">Videos</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div style="<?php echo "background: url(". get_field( "background_tour" ) .")"?>" class="homeItemsTbone_unique tour"><a href="http://dev.gravity.cr/tboneWP/tour/">
              <p class="uk-flex">Tour</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-2 oh">
          <div style="<?php echo "background: url(". get_field( "background_videos" ) .")"?>" class="homeItemsTbone_unique videos"><a href="http://dev.gravity.cr/tboneWP/videos/">
              <p class="uk-flex">Videos</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-2 oh">
          <div style="<?php echo "background: url(". get_field( "backgrounds_news" ) .")"?>" class="homeItemsTbone_unique news"><a href="http://dev.gravity.cr/tboneWP/news/">
              <p class="uk-flex">Noticias</p></a></div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>