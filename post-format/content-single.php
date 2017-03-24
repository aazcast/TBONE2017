<?php
  $grv_post_class = array( 'post'  );
  if( is_single() ) { $grv_post_class[] = 'post-single'; }
  $image = wp_get_attachment_image_src( get_post_thumbnail_id(the_ID()), 'single-post-thumbnail' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($grv_post_class); ?> itemscope itemtype="https://schema.org/BlogPosting">
  <div class="headerOtherPage">
    <?php if ( is_single()) : ?>
      <?php the_title('<h1 class="post-title">', '</h1>' ); ?>
    <?php else: ?>
      <?php the_title( sprintf( '<h1 class="post-title"><a href="%s" itemprop="url" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    <?php endif; ?>
  </div><!-- /.post-head -->
  <section class="container">
  <?php
    do_action( 'grv_post_meta' );
    do_action( 'grv_post_body' );
  ?>
    <img src="<?php echo $image[0]; ?>">
    </section>
  <?php  if( is_single() ) : ?>
    <div class="post-foot">
     <!--  <?php
        #do_action( 'grv_post_share_btn' );
       ?>
    </div>
    <?php comments_template( '', true ); ?>-->
  <?php endif; ?>
</article><!-- /.post -->
<section class="moreComponent uk-grid">
      <div class="uk-width-small-1-1 uk-width-medium-1-2"><a href="#">
          <div class="moreComponent-image moreAlb">
            <h2>Albums</h2>
            <div class="moreComponent_bg"></div>
          </div></a></div>
      <div class="uk-width-small-1-1 uk-width-medium-1-2"><a href="#">
          <div class="moreComponent-image moreAlb">
            <h2>Galeria</h2>
            <div class="moreComponent_bg"></div>
          </div></a></div>
</section>