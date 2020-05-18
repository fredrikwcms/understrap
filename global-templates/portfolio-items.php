<?php
/**
 * Portfolio Items Setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get the three latest Portfolio Items
$portfolio_items = new WP_Query([
    'post_type'         =>  'us_portfolio',
    'posts_per_page'    =>  -1,
]);

// Did we get any Portfolio Items?
if ($portfolio_items->have_posts()) :
    // Great success!
    ?>

        <div class="wrapper" id="wrapper-portfolio-items">
            <div class="container">
                <div class="row">
                    <!-- Loop over the Portfolio Items -->
                    <?php while($portfolio_items->have_posts()) : ?>
                        <?php $portfolio_items->the_post(); ?>

                        <?php get_template_part('loop-templates/content-us_portfolio'); ?>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                </div> <!-- ./row -->
            </div>  <!-- ./container -->
        </div>  <!-- #/wrapper-portfolio-items -->
<?php endif; ?>