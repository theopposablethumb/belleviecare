<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>


	<main>
		<div class="section news">
			<div class="content">
				<h1>The latest news and events from BelleVie Care</h1>
			</div>
			<div class="content flex">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				static $count = 0;
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; ?>
			</div>
			<div class="content">
			<?php the_posts_navigation( array('prev_text' => 'Previous page', 'next_text' => 'Next page', 'screen_reader_text' => 'News navigation', 'aria_label' => 'News', 'class' => 'news-navigation') ); ?>
			</div>
		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
	</div>
	</main><!-- #main -->

<?php
get_footer();
