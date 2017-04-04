<?php
/**
 * Template Name: Featured Page
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
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
  <body style="<?php echo "background: url(". get_field( "background-featured" ) .")"?>" class="featuredPage" id="top-image">
<!--   <img src="
<?php // echo get_template_directory_uri() .'/img/album/pamidios.jpg'?>
"/> -->
  <div class="featuredVideo" style="max-width: 300px;">
  <script src="https://fast.wistia.com/embed/medias/np9n9evv0f.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:100.0% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_np9n9evv0f seo=false videoFoam=true" style="height:100%;width:100%">&nbsp;</div></div></div>
  </div>
    <div class="featuresPage_social">
      <ul class="uk-clearfix">
        <li><a href="#"><i class="fa fa-spotify"></i></a></li>
        <li><a href="#"><i class="fa fa-apple"></i></a></li>
        <li><a href="#"><i class="fa fa-amazon"></i></a></li>
      </ul>
    </div>
    <div class="goSite"><a href="en/">Go to Site </a><a href="es/inicio/">Ir al Sitio</a></div>
    <?php wp_footer(); ?>
  </body>
</html>