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
		$postType;
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			$thisPost = get_post_type();
			if ($thisPost == 'job') {$postType = 'job';};
		endwhile; // End of the loop.
		?>
		</div>
		</div>
		<?php
			if ($postType == 'job') {
				echo '<div class="section whitebg">
					<div class="content">
						<p>At BelleVie Care we want everyone to bring their authentic selves to work. <a href="/about-bellevie/">Find out more about BelleVie Care and our values</a></p>
						<p>Interested in working for us? <a href="/jobs-in-home-care/">View more job vacancies at BelleVie Care</a></p>
					</div>
				</div>';		
			}; 
		?>
	</main><!-- #main -->

<?php
get_footer();
