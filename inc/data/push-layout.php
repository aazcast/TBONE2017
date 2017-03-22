<?php
/**
 * uniqueGravity Posts Layout
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */
/*------------------------------------------------------------
  Get Post featured image
============================================================*/
if ( !function_exists( 'grv_get_post_featured_image' ) ) :
  function grv_get_post_featured_image() { ?>
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="post-image">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
        </a>
      </div><!-- /.post-image -->
    <?php endif; ?>
  <?php }
endif;
add_action( 'grv_post_featured_image', 'grv_get_post_featured_image' );

/*------------------------------------------------------------
  Get Post Meta
============================================================*/
if ( !function_exists( 'grv_get_post_meta' ) ) :
  function grv_get_post_meta() { ?>
    <div class="post-meta">
      <ul>
        <?php if (ot_get_option('grv_author_single_post') == "on") : ?>
          <li>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>" class="post-author">
              <span class="post-author-image">
                <?php echo get_avatar(get_the_author_meta( 'ID' ), 55); ?>
              </span>
              <span class="post-author-name"><?php the_author_meta('display_name'); ?></span>
            </a>
          </li>
        <?php endif; ?>
        <?php if (ot_get_option('grv_date_single_post') == "on") : ?>
          <li>
            <i class="fa fa-calendar-o"></i> <?php the_time( get_option( 'date_format' ) ); ?>
          </li>
        <?php endif; ?>
        <?php if (ot_get_option('grv_comments_single_post') == "on") : ?>
          <li>
            <a href="<?php the_permalink(); ?>#comments">
              <i class="fa fa-large fa-comments-o"></i> <?php echo get_comments_number(); ?>
            </a>
          </li>
        <?php endif; ?>
        <?php if (ot_get_option('grv_like_single_post') == "on") : ?>
          <?php echo grv_get_post_like(get_the_ID()); ?>
        <?php endif; ?>
      </ul>
    </div><!-- /.post-meta -->
  <?php }
endif;
add_action( 'grv_post_meta', 'grv_get_post_meta' );


/*------------------------------------------------------------
  Get Post Meta for List of post
============================================================*/
if ( !function_exists( 'grv_get_list_post_meta' ) ) :
  function grv_get_list_post_meta() { ?>
    <div class="post-meta">
      <ul>
        <?php if (ot_get_option('grv_author_blog_post') == "on") : ?>
          <li>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>" class="post-author">
              <span class="post-author-image">
                <?php echo get_avatar(get_the_author_meta( 'ID' ), 55); ?>
              </span>
              <span class="post-author-name"><?php the_author_meta('display_name'); ?></span>
            </a>
          </li>
        <?php endif; ?>
        <?php if (ot_get_option('grv_date_blog_post') == "on") : ?>
          <li>
            <i class="fa fa-calendar-o"></i> <?php the_time( get_option( 'date_format' ) ); ?>
          </li>
        <?php endif; ?>
        <?php if (ot_get_option('grv_comments_blog_post') == "on") : ?>
          <li>
            <a href="<?php the_permalink(); ?>#comments">
              <i class="fa fa-large fa-comments-o"></i> <?php echo get_comments_number(); ?>
            </a>
          </li>
        <?php endif; ?>
        <?php if (ot_get_option('grv_like_blog_post') == "on") : ?>
          <?php echo grv_get_post_like(get_the_ID()); ?>
        <?php endif; ?>
      </ul>
    </div><!-- /.post-meta -->
  <?php }
endif;
add_action( 'grv_list_post_meta', 'grv_get_list_post_meta' );

/*------------------------------------------------------------
  Get Post Body
============================================================*/
if ( !function_exists( 'grv_get_post_body' ) ) :
  function grv_get_post_body() {
    global $post;
    $post_format = get_post_format( $post->ID ); ?>
    <div class="post-body">
      <div class="entry" itemprop="articleBody">
        <?php
          if ( is_single() ) {
            if ($post_format == 'quote') {
              the_content();
            } elseif ($post_format == 'gallery') {
              the_content();
            } elseif ($post_format == 'video') {
              the_excerpt();
            } else {
              the_content();
            }
          } else {
            the_content( sprintf( __( 'Read More', 'uniqueGravity' ),  false ) );
          }

        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'uniqueGravity' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
          'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'uniqueGravity' ) . ' </span>%',
          'separator'   => '<span class="screen-reader-text">, </span>',
        ) ); ?>
      </div><!-- /.entry -->
    </div><!-- /.post-body -->
  <?php }
endif;
add_action( 'grv_post_body', 'grv_get_post_body' );

/*------------------------------------------------------------
  Get Post Category and Tags
============================================================*/
if ( !function_exists( 'grv_get_post_cat_tag' ) ) :
  function grv_get_post_cat_tag() { ?>
    <div class="post_tag_category">
      <?php if(ot_get_option('grv_category_single_post') == "on") : ?>
        <div class="post-category">
          <ul><li><?php the_category('</li><li>'); ?></li></ul>
        </div>
      <?php endif; ?>
      <?php if(ot_get_option('grv_tags_single_post') == "on") : ?>
      <div class="post-tags">
        <?php if ( get_the_tag_list( '', ', ' ) ) { ?>
          <div class="tags"><i class="fa fa-tags"></i> <?php echo get_the_tag_list('',', ',''); ?></div>
        <?php } ?>
      </div><!-- /.post-tags -->
      <?php endif; ?>
    </div>
  <?php }
endif;
add_action( 'grv_post_cat_tag', 'grv_get_post_cat_tag' );


/*------------------------------------------------------------
  Get Post Author bio
============================================================*/
if ( !function_exists( 'grv_get_post_author_bio' ) ) :
  function grv_get_post_author_bio() { ?>
    <?php if(ot_get_option('grv_author_bio_single_post') == 'on' && get_the_author_meta( 'description' )) : ?>
      <div class="post-authorbox">
        <div class="post-authorbox-image">
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>">
            <?php echo get_avatar(get_the_author_meta( 'ID' ), 155); ?>
          </a>
        </div><!-- /.post-authorbox-image -->

        <div class="post-authorbox-content">
          <h4><?php the_author_meta('display_name'); ?></h4>

          <p><?php the_author_meta('description') ?></p>
        </div><!-- /.post-authorbox-content -->
      </div><!-- /.post-authorbox -->
    <?php endif; ?>
  <?php }
endif;
add_action( 'grv_post_author_bio', 'grv_get_post_author_bio' );

/*------------------------------------------------------------
  Get Post share btn
============================================================*/
if ( !function_exists( 'grv_get_post_share_btn' ) ) :
  function grv_get_post_share_btn() { ?>
    <?php if(ot_get_option('grv_share_btn_single_post') == 'on' ) : ?>
      <div class="social-icons">
        <span><?php _e('Share:', 'uniqueGravity') ?></span>
        <ul class="cf">
          <li class="facebook">
            <a title="<?php _e('Compartir en Facebook', 'uniqueGravity'); ?>" class="social-post" data-share-url="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
          </li>
          <li class="twitter">
            <a title="<?php _e('Compartir en Twitter', 'uniqueGravity'); ?>" class="social-post" data-share-url="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="googleplus">
            <a title="<?php _e('Compartir en Google Plus', 'uniqueGravity'); ?>" class="social-post" data-share-url="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
          </li>
          <li class="linkedin">
            <a title="<?php _e('Compartir en Linkedin', 'uniqueGravity'); ?>" class="social-post" data-share-url="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&summary=<?php the_title(); ?>"><i class="fa fa-linkedin"></i></a>
          </li>
        </ul>
      </div><!-- /.social-icons -->
    <?php endif; ?>
  <?php }
endif;
add_action( 'grv_post_share_btn', 'grv_get_post_share_btn' );


?>