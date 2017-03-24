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
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-spotify"></i></a></li>
          </ul>
        </nav>
        <div class="divider"></div><a href="contact.html">Contact</a>
      </div>
      <div class="copyFooter uk-clearfix">
        <div class="fLeft">
          <p>2017 &copy T-BONE</p>
        </div>
        <div class="fRight">
          <p>Site by Gravity</p>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>