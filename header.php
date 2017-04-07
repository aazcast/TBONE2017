<?php
/**
 * uniqueGravity Header Template
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title><?php wp_title() ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="theme-color" content="#1F2421"/>
    <meta content="#1F2421" name="msapplication-TileColor"/>
    <!-- build:css css/vendor.min.css-->
    <!-- endbuild-->
    
    <?php wp_head(); ?>
  </head>
  <body class="hPage" <?php body_class(); ?>>
    <header class="uk-position-top uk-clearfix" data-uk-observe="data-uk-observe">
      <div class="logo">
        <a href="/">
          <img src="<?php echo get_template_directory_uri() .'/img/logo.png' ?>"/>
        </a> 
      </div>
      <div class="navigation">
        <div class="g-credits-lang">
          <?php 
            $languages = icl_get_languages();
            if(0 < count($languages)){
              foreach($languages as $l){
                if(!$l['active']) { 
                  $langs[] = '<a href="'.$l['url'].'">'.$l['translated_name'].'</a>'; 
                }
                if ($l['active']) {
                  $langs[] = '<a class="g-activeLang" href="'.$l['url'].'">'.$l['translated_name'].'</a>'; 
                }
              }
              echo join(' | ', $langs);
            }
          ?>
        </div>
        <nav class="social">
          <ul>
            <li><a href="https://www.facebook.com/tboneoficial/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.twitter.com/BoneySoprano"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/tboneoficial/"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://www.youtube.com/tbonemusic"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://open.spotify.com/artist/6h2GxbU7emrTikSWxbMyxd"><i class="fa fa-spotify"></i></a></li>
          </ul>
        </nav>
        <!--end -/navsocial-->
        <nav class="menu"><a class="_menuMovil" href="javascript:;">Menu<i class="fa fa-bars"></i></a></nav>
      </div>
    </header>
    <div class="menuItems">
      <nav class="menuItemsContainer">
        <?php
          if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array('depth' => 2, 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'tboneMenuMain', 'menu_id' => 'menuUl'));
        } ?>
      </nav>
    </div>
    <main>