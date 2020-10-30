<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		<div class="section news">
		<div class="content">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
		</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
