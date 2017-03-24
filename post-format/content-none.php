<?php
  $grv_post_class = array( 'post'  );
  if( is_single() ) { $grv_post_class[] = 'post-single'; }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($grv_post_class); ?> itemscope itemtype="https://schema.org/BlogPosting">
  <div class="post-head2">
    <?php if ( is_single()) : ?>
      <?php the_title('<h1 class="post-title">', '</h1>' ); ?>
    <?php else: ?>
      <?php the_title( sprintf( '<h1 class="post-title"><a href="%s" itemprop="url" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    <?php endif; ?>
  </div><!-- /.post-head -->
  <?php
    do_action( 'grv_post_meta' );
    do_action( 'grv_post_body' );
  ?>
  <?php  if( is_single() ) : ?>
    <div class="post-foot">
      <?php
        do_action( 'grv_post_share_btn' );
       ?>
    </div>
    <?php comments_template( '', true ); ?>
  <?php endif; ?>
</article><!-- /.post -->