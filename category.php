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
				
		<?php if ( have_posts() ) :

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

		else : ?>

				<h1>Whoops, that link is broken</h1>
				<p>Don't worry, you can still view our WellBeing services here. We're currently helping people live their best life in <a href="/locations/oxfordshire-homecare/">Oxfordshire</a> and the <a href="/locations/county-durham-homecare/">North East.</a></p>
			</div>
			<div class="content flex">
			<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'branch', 'meta_key'=> 'contact_us', 'meta_value' => true, 'order' => 'ASC', 'posts_per_page' => -1 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="branchListing content flex"><a class="phone" href="tel: ' . get_field('phone_number') . '">' . get_field('phone_number') . '</a>';
    				echo '<h2 class="light">' . get_field('branch_name') . '</h2>';
    				echo '<p>' . get_field('opening_hours') . '</p></article>';
				}
				wp_reset_postdata(); ?>
				
				<article class="branchListing content flex justifyLeft"><a class="email" href="mailto: info@belleviecare.co.uk">info@belleviecare.co.uk</a><p>Send us an email, we usually respond within 24 hours.</p>
					
		<?php endif; ?>
		

		</div>
	</div>
	</main><!-- #main -->

<?php
get_footer();
