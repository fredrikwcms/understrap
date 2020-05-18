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
		// check if the repeater field has rows of data
		if( have_rows('album_songs') ):
			echo "<ul>";
			// loop through the rows of data
			while ( have_rows('album_songs') ) : the_row();
				echo "<li>";
				// display a sub field value
				echo '<span class="song-track-number">';
				echo the_sub_field('song_track_number');
				echo ' -</span>';
				echo "&nbsp;";
				the_sub_field('song_title'); 
				echo " -&nbsp;";
				the_sub_field('song_length');
				_e('seconds', 'my_theme');
				echo "<br>";
				echo "</li>";

			endwhile;

		else :

			// no rows found

		endif;
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
