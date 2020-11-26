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
					$categories = get_the_category();
					$category_id = $categories[0]->cat_ID;
					$category = get_cat_name( $category_id );
					$postName = $post->post_name; //Get the slug of the current page
					if($category === 'News') {
						echo '<h1>Latest news and events from BelleVie Care</h1>';
					} else {
						echo '<h1>News and events from BelleVie Care ' . $category . '</h1>';
					}
					echo '<p>' . $categories . '</p>';
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
