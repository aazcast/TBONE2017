<?php
/**
 * uniqueGravity Footer template
 *
 * @package WordPress
 * @subpackage uniqueGravity
 * @since uniqueGravity 1.5
 */
?>  
    </main> <!-- ./main -->
    <footer>
      <div class="containerFooter"><img src="<?php echo get_template_directory_uri() .'/img/logo.png' ?>"/>
        <nav class="socialFooter uk-clearfix">
          <ul>
            <li><a href="https://www.facebook.com/tboneoficial/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.twitter.com/BoneySoprano"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/tboneoficial/"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://www.youtube.com/tbonemusic"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://open.spotify.com/artist/6h2GxbU7emrTikSWxbMyxd"><i class="fa fa-spotify"></i></a></li>
          </ul>
        </nav>
        <div class="divider"></div>
        <a href="mailto:tboneoficial@gmail.com"><?php _e('Contact', 'uniqueGravity'); ?></a>
        <p>tboneoficial@gmail.com</p>
      </div>
      <div class="copyFooter uk-clearfix">
        <div class="fLeft">
          <p>2017 &copy T-BONE</p>
        </div>
        <div class="fRight">
          <p><?php _e('Site by', 'uniqueGravity'); ?> <a href="http://gravity.cr">Gravity</a></p>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>