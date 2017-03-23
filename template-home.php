<?php
/**
 * Template Name: Home Page
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>

<?php get_header(); ?>
 <section class="homeLastPost uk-padding-remove uk-position-relative">
      <div class="uk-cover-background uk-position-relative bgHome"><img class="uk-invisible maxH-Home" src="img/bg.jpg"/>
        <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle bgModal">
          <div class="detailsHome">
            <h1>This is the last blog</h1>
            <p class="desc">This is a small description about the last notice or post in the blog, that i had. Just check this.</p><a href="blog.html">Read More</a>
          </div>
        </div>
      </div>
    </section>
    <section class="homeItemsTbone">
      <div data-uk-grid="data-uk-grid">
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div class="homeItemsTbone_unique bio"><a href="/es/galeria.html">
              <p class="uk-flex">Biography</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div class="homeItemsTbone_unique gallery"><a href="/news/">
              <p class="uk-flex">Gallery</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div class="homeItemsTbone_unique albums"><a href="/es/galeria.html">
              <p class="uk-flex">Albums</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">s
          <div class="homeItemsTbone_unique videos"><a href="/es/tour.html">
              <p class="uk-flex">Videos</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-3 oh">
          <div class="homeItemsTbone_unique tour"><a href="/es/tour.html">
              <p class="uk-flex">Tour</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-2 oh">
          <div class="homeItemsTbone_unique videos"><a href="/es/tour.html">
              <p class="uk-flex">Videos</p></a></div>
        </div>
        <div class="uk-width-small-2-2 uk-width-medium-1-2 oh">
          <div style="<?php echo "background: url(". get_field( "backgrounds_news" ) .") no-repeat !important;"?>" class="homeItemsTbone_unique news"><a href="/es/tour.html">
              <p class="uk-flex">News</p></a></div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>