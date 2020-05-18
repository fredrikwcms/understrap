<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php 
			$albums = get_field('artist_albums'); 
			// print_r($albums);
			foreach($albums as $album) {
				// var_dump($album);
				// $meta = get_post_meta($album->ID, 'album_songs');
				// var_dump($meta);
				// print_r($album);
				$songs = get_the_terms($album, 'my_song');
				// var_dump($songs);
				foreach($songs as $song) {
					echo $song->name;
				}
			}
			// $songs = get_post_meta($albums->ID);
			// print_r($songs);
			
			
			?>



		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
