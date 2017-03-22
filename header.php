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
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <?php
        if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( array('depth' => 2, 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'g-cm-menuNav cf', 'menu_id' => 'menuUl'));
      } ?>
    </header>
    <section class="g-logo">
      <?php
        bloginfo('name');
        }?>
    </section>
    <main>