<div class="wrapper-portfolio col-md-6 col-lg-4">
    <a id="portfolio-link-<?php the_ID();?>" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>

    <?php the_excerpt(); ?>

    <?php 
    $link = get_post_meta($post->ID, 'Link');
    // What do we get from $link?
    // var_dump($link); 
    if($link) : ?>
        <a href="<?php echo $link[0]; ?>">Link to this project</a>
    <?php endif; ?>
</div>    

