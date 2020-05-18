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

// $counter = count($usps->posts);

$count = 0;

if ($usps->have_posts() ) {
    // Great success!
?>

<div class="wrapper" id="wrapper-slider">
    <div class="container">
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php while ($usps->have_posts()) : $usps->the_post(); ?>
                    <?php
                        $post_thumbnail = get_the_post_thumbnail_url(get_the_id(),'full');
                        // var_dump($post_thumbnail);
                    ?>  

                    <div class="carousel-item w-100 <?php if($count <= 0){echo "active";  } ?>" >
                        <!-- <img class="d-block w-100" src="<?php //echo esc_url($post_thumbnail); ?>" alt="<?php //the_title(); ?>"> -->
                        <div class="w-100" style="background-image: url('<?php echo $post_thumbnail; ?>');">
                            <div class="carousel-post">
                                <h1><?php the_title(); ?></h1>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    // var_dump($count); 
                    $count++;
                    ?>
                <?php endwhile; ?>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            <?php 
            // Don't forget to reset postdata
            wp_reset_postdata();
            ?>
        </div> <!-- ./row -->
    </div>  <!-- ./container -->
</div>  <!-- ./wrapper-usps -->

<?php } ?>