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
		<div class="section">
			<div class="content">
				<?php
				
				$term = get_queried_object();
				$postName = $term->slug; //Get the slug of the current page
				$catTitle = ucwords(str_replace("-"," ", $postName));
				if ($postName === 'news') {
					echo '<h1>Latest News and Events from BelleVie Care</h1>';
				} else {
					echo '<h1>Latest News and Events from BelleVie ' . $catTitle . '</h1>';
				};
				?>			
			</div>
			<div class="content flex news">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; ?>
				</div>
				<div class="content">
			<?php the_posts_navigation($args = array( 'prev_text' => 'Older articles', 'next_text' => 'Newer articles', 'screen_reader_text' => 'Continue reading articles', 'aria_label' => 'articles'));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</div>
	</main><!-- #main -->

<?php
get_footer();
