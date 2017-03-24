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

<div class="headerOtherPage">
      <h1>Biography</h1>
    </div>
    <section class="container">
   <?php if ( $post->post_content != '' ) { ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; ?>
    <?php } // End If ?>
    <?php 
    $args = array( 'post_type' => 'all_album', 'posts_per_page' => 12 );
    $the_query = new WP_Query( $args ); 
    ?>
    <div class="g-row">
    <?php if ( $the_query->have_posts() != '' ) { ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="g-c-1-1 g-c-m-1-3">
          <div class="destinationItem">
          <?php
           if ( has_post_thumbnail()) {
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
           }
           ?>
            <div class="destinationItem-image" style="background-image: url('<?php echo $large_image_url[0] ?>')"></div>
            <div class="destinationItem-desc">
              <p><?php the_title(); ?></p>
              <a href="<?php echo get_permalink()?>"><?php echo _e( "Read More...", "g-heirsbridge" ) ?></a>
            </div>
          </div>
        </div>
        <?php grv_pagination() ?>
      <?php endwhile; ?>
    <?php } // End If ?>
      <p><?php echo $recent["post_title"] ?></p>
    </section>
<?php get_footer(); ?>