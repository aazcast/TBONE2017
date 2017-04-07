<?php
/**
 * Template Name: Tour Page
 *
 * @package GRV
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */
?>

<?php get_header(); ?>
<div class="tourPage">
    <div class="headerOtherPage">
      <h1>Tour</h1>
    </div>
    <div class="tourComming">
      <?php if( have_rows('info_about_date') ): ?>

        <table class="tourTable">

        <thead>
            <tr>
                <th><?php _e('Date', 'uniqueGravity'); ?></th>
                <th><?php _e('Venue', 'uniqueGravity'); ?></th>
                <th><?php _e('Location', 'uniqueGravity'); ?></th>
                <th><?php _e('Tickets', 'uniqueGravity'); ?></th>
            </tr>
        </thead>
        <tbody>

        <?php while( have_rows('info_about_date') ): the_row(); 

        // vars
        $date = get_sub_field('date');
        $venue = get_sub_field('venue');
        $location = get_sub_field('location');
        $link = get_sub_field('link');
        ?>
        <tr>
            <td><?php echo $date; ?></td>
            <td><?php echo $venue; ?></td>
            <td><?php echo $location; ?></td>
            <td><a href="<?php echo $link; ?>" class="btn-tickets"><?php _e('Tickets', 'uniqueGravity'); ?></a></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>

      <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>