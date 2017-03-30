<?php
/**
 * The GRV INDEX
 *
 * @package WordPress
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>
<?php get_header(); ?>
<?php
  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
  $grv_post_class = array( 'post'  );
  if( is_single() ) { $grv_post_class[] = 'post-single'; }
?>
<article id="post-<?php the_ID();?>" <?php post_class($grv_post_class); ?> itemscope itemtype="https://schema.org/BlogPosting">
  <div class="headerOtherPage">
    <?php if ( is_single()) : ?>
      <h1 class="post-title"><?php the_title(); ?> | <?php echo get_field("año_del_album", get_the_ID()); ?></h1>

    <?php else: ?>
      <?php the_title( sprintf( '<h1 class="post-title"><a href="%s" itemprop="url" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    <?php endif; ?>
    <img src="<?php echo $large_image_url[0]; ?>">
  </div><!-- /.post-head -->
  <section class="container">
  <p><?php echo get_post_field('post_content', get_the_ID());?></p>
  <?php
    do_action( 'grv_post_meta' );
    do_action( 'grv_post_body' );
  ?>
    <?php  if( is_single() ) : ?>
  <?php endif; ?>
  <h2>Songs</h2>
  <ul class="songs">
  <?php
  $var=0;
// check if the repeater field has rows of data
if( have_rows('canciones_album') ):

  // loop through the rows of data
    while ( have_rows('canciones_album') ) : the_row();
        $var=$var+1;
        // display a sub field value
        $content = get_sub_field('nombre_de_la_cancion');
        echo '<li>' . $var. '- ' . $content . '</li>';
    endwhile;

else :

    // no rows found

endif;

?>
</ul>
      <h2>Listen</h2>
      <ul class="listen uk-clearfix">
        <li><a href="<?php echo get_field("spotify", get_the_ID()); ?>"><i class="fa fa-spotify"></i></a></li>
        <li><a href=" <?php echo get_field("apple_music", get_the_ID()); ?>"><i class="fa fa-apple"></i></a></li>
        <li><a href=" <?php echo get_field("amazon", get_the_ID()); ?>"><i class="fa fa-amazon"></i></a></li>
      </ul>
    </section>
</article><!-- /.post -->
<section class="moreComponent uk-grid">
      <div class="uk-width-small-1-1 uk-width-medium-1-2"><a href="#">
          <div class="moreComponent-image moreAlb">
            <h2>Albums</h2>
            <div class="moreComponent_bg"></div>
          </div></a></div>
      <div  class="uk-width-small-1-1 uk-width-medium-1-2"><a href="#">
          <div style="<?php echo "background: url(". get_field( "background_gallery , 2" ) .")"?>" class="moreComponent-image moreAlb">
            <h2>Galeria</h2>
            <div class="moreComponent_bg"></div>
          </div></a></div>
</section>


<script>
jQuery(document).ready(function(){
    jQuery('body').addClass("otherPage albumPage");
    jQuery('body').removeClass("hPage");
    
});
</script>
<?php get_footer(); ?>