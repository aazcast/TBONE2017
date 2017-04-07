<?php
/**
 * uniqueGravity Library
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */

//Define Plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/*-----------------------------------------------------------------------------------*/
/*  Admin Menu
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'grv_bar_menu' ) ):
  function grv_bar_menu() {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
      return;
    $admin_dir = get_admin_url();
    $wp_admin_bar->add_menu(
      array(
        'id' => 'grv_to',
        'parent' => 'custom_menu',
        'title' => __( 'Theme Options', 'uniqueGravity' ),
        'href' => $admin_dir .'themes.php?page=ot-theme-options',
        'meta' => array('title' => __('Theme Options', 'uniqueGravity' ) )
      )
    );
    $wp_admin_bar->add_menu(
      array(
        'id' => 'grv_sp',
        'parent' => 'custom_menu',
        'title' => __( 'Soporte', 'uniqueGravity' ),
        'href' => esc_url('http://www.gravity.cr'),
        'meta' => array('title' => __('Soporte', 'uniqueGravity' ) )
      )
    );
  }
  add_action('admin_bar_menu', 'grv_bar_menu', '1000');
endif;

/*-----------------------------------------------------------------------------------*/
/*  Page Navi - Navigation
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'grv_pagination' ) ) {
  function grv_pagination() {

  global $wp_query;
  global $page, $numpages, $multipage, $more;

    $big = 999999999; // need an unlikely integer
    $paginate_links = paginate_links(
      array(
        'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link($big) ) ),
        'format'       => '',
        'current'      => max( 1, get_query_var('paged') ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '<i class="fa fa-chevron-left"></i>',
        'next_text'    => '<i class="fa fa-chevron-right"></i>',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
      )
    );

    $paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
    $paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
    $paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'><a href='#'>", $paginate_links );
    $paginate_links = str_replace( "</span>", "</a>", $paginate_links );
    $paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
    $paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
    // Display the pagination if more than one page is found
    if ( $paginate_links ) {
      echo '<div class="pagination-centered">'.$paginate_links.'</div><!--// end .pagination -->';
    }
  } //End Function Pagination
} //End Pagination

/*-----------------------------------------------------------------------------------*/
/*  Doctitle
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'grv_doctitle' ) ) {
  function grv_doctitle() {
    if ( is_search() ) {
      $content = __('Resultados de:', 'uniqueGravity');
      $content .= ' ' . esc_html(stripslashes(get_search_query()));
    }
    elseif ( is_category() ) {
      $content = __('Archivos de Categría:', 'uniqueGravity');
      $content .= ' ' . single_cat_title("", false);
    }
    elseif ( is_day() ) {
      $content = __( 'Archivos Diarios:', 'uniqueGravity');
      $content .= ' ' . esc_html(stripslashes( get_the_date()));
    }

    elseif ( is_month() ) {
      $content = __( 'Archivos Mensuales:', 'uniqueGravity');
      $content .= ' ' . esc_html(stripslashes( get_the_date( 'F Y' )));
    }
    elseif ( is_year()  ) {
      $content = __( 'Archivos Diarios:', 'uniqueGravity');
      $content .= ' ' . esc_html(stripslashes( get_the_date( 'Y' ) ));
    }

    elseif ( is_tag() ) {
      $content = __('Archivos de etiqueta:', 'uniqueGravity');
      $content .= ' ' . single_tag_title( '', false );
    }
    elseif ( is_author() ) {
      $content = __("Posts de Autor", 'uniqueGravity');

    }
    elseif ( is_404() ) {
      $content = __('No encontrado', 'uniqueGravity');
    }
    else {
      $content = '';
    }

    $elements = array("content" => $content);
    // Filters should return an array
    $elements = apply_filters('grv_doctitle', $elements);

    // But if they don't, it won't try to implode
      if(is_array($elements)) {
        $doctitle = implode(' ', $elements);
      } else {
        $doctitle = $elements;
      }
      if ( is_search() || is_category() || is_day() || is_month() || is_year() || is_404() || is_tag() || is_author() ) {
        $doctitle =  $doctitle;
      }
    echo esc_html($doctitle);
  }
}

/*-----------------------------------------------------------
  Breadcrumbs
-----------------------------------------------------------*/
if ( ! function_exists( 'grv_breadcrumbs' ) ) {
  function grv_breadcrumbs() {
    $showOnHome   = '0'; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter  = ' '; // delimiter between crumbs

    $showCurrent  = '1'; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before     = '<li class="g-current">'; // tag before the current crumb
    $after    = '</li>'; // tag after the current crumb

    $text['home'] = __('Inicio','uniqueGravity'); // text for the 'Home' link
    $text['category'] = __('Archivo de %s','uniqueGravity'); // text for a category page
    $text['search'] = __('Resultados de: %s','uniqueGravity'); // text for a search results page
    $text['tag'] = __('Posts de %s','uniqueGravity'); // text for a tag page
    $text['author'] = __('Posts por %s','uniqueGravity'); // text for an author page
    $text['404'] = __('Error 404','uniqueGravity'); // text for the 404 page

    global $post;
    $homeLink = esc_url( home_url( '/' ) );
    echo '<li><a href="' . $homeLink . '">' . $text['home'] . '</a></li> ' . $delimiter . ' ';
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
    } elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;
    } elseif ( is_day() ) {
      echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
    } elseif ( is_month() ) {
      echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '' . $slug['slug'] . '/">' . $post_type->labels->name . '</a></li>';
        //echo '<li>' . $post_type->labels->singular_name .'</li>' ;
        if ($showCurrent == 1) echo ' ' . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
        echo $before . $cats . $after;
          if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
    } else if ( (is_plugin_active( 'woocommerce/woocommerce.php')) && is_shop() ) {
    //} elseif (function_exists('is_shop') ) {
      echo "<li class='g-current'>";
      echo __('Tienda','uniqueGravity');
      echo "</li>";
    } elseif ( is_home() && !is_front_page() ) {
      echo "<li class='g-current'>";
      echo __('Blog','uniqueGravity');
      echo "</li>";
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->name . $after;
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      //$cat = get_the_category($parent->ID); $cat = $cat[0];
      //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a></li>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;
    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;
    }
  } // end breadcrumbs()
} //end if breadcrumbs()

/*-----------------------------------------------------------
  Modify The Read More Link Text
-----------------------------------------------------------*/
function grv_modify_read_more_link() {
  return '<div class="post-actions"><a class="btn" href="' . esc_url(get_permalink()) . '">'.__('Read More', 'uniqueGravity').'</a></div>';
}
add_filter( 'the_content_more_link', 'grv_modify_read_more_link' );

/*-----------------------------------------------------------
   Replaces the excerpt "more" text by a link
-----------------------------------------------------------*/
function grv_excerpt_more($more) {
    global $post;
    return '<div class="post-actions"><a class="btn" href="' . esc_url(get_permalink($post->ID)) . '">'.__('Read More', 'uniqueGravity').'</a></div>';
}
add_filter('excerpt_more', 'grv_excerpt_more');


/*------------------------------------------------------------
  Get Attachement image info
============================================================*/
if ( ! function_exists( 'grv_get_attachment_info' ) ) {
  function grv_get_attachment_info( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
      'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
      'caption' => $attachment->post_excerpt,
      'description' => $attachment->post_content,
      'href' => get_permalink( $attachment->ID ),
      'src' => $attachment->guid,
      'title' => $attachment->post_title
    );
  }
} //End IF grv attachment info file

?>