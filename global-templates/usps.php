<?php
/**
 * USPs setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get the three latest USPs
$usps = new WP_Query([
    'post_type'         =>      'us_usp',
    'posts_per_page'    =>      3,
]);

if ($usps->have_posts() ) {
    // Great success!
?>

<div class="wrapper" id="wrapper-usps">
    <div class="container">
        <div class="row">
            <?php while ($usps->have_posts()) : $usps->the_post(); ?>
                <!-- For each post, include this template part -->
                <?php get_template_part('loop-templates/content', 'usp'); ?>
                    
            <?php endwhile; ?>
            <?php 
            // Don't forget to reset postdata
            wp_reset_postdata();
            ?>
        </div> <!-- ./row -->
    </div>  <!-- ./container -->
</div>  <!-- ./wrapper-usps -->

<?php } ?>