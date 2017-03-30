<?php
/**
 * Template Name: Album Page
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>

<?php get_header(); ?>
<div class="albumPage">
<div class="headerOtherPage">
      <h1>Albums</h1>
      <h1><?php echo get_field( "año_del_album" )?></h1>
    </div>
    <section class="albumsContainer">
     <?php if ( $post->post_content != '' ) { ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'page' ); ?>
        <?php endwhile; ?>
      <?php } // End If ?>
      <?php 
      $args = array( 'post_type' => 'album', 'posts_per_page' => 12 );
      $the_query = new WP_Query( $args ); 
      ?>
      <div data-uk-grid="data-uk-grid">
      <?php if ( $the_query->have_posts() != '' ) { ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="uk-width-small-1-1 uk-width-medium-1-4 oh">
          <?php
           if ( has_post_thumbnail()) {
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
           }
           ?>
          <div style="background-image: url('<?php echo $large_image_url[0] ?>')" class="homeItemsTbone_unique albumpamidios">
          <a href="<?php echo get_permalink()?>"><p class="uk-flex"><?php the_title(); ?> | <?php echo get_field("año_del_album", get_the_ID()); ?></p></a></div>
        </div>
            <?php grv_pagination() ?>
          <?php endwhile; ?>
        <?php } // End If ?>
      </div>
    </section>

</div>
<?php get_footer(); ?>