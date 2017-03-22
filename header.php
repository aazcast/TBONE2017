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
  <body <?php body_class(); ?>>
    <header class="uk-position-top uk-clearfix" data-uk-observe="data-uk-observe">
      <div class="logo"><img src="img/logo.png"/></div>
      <div class="navigation">
        <nav class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-spotify"></i></a></li>
          </ul>
        </nav>
        <!--end -/navsocial-->
        <nav class="menu"><a class="_menuMovil" href="javascript:;">Menu<i class="fa fa-bars"></i></a></nav>
      </div>
    </header>
    <main>