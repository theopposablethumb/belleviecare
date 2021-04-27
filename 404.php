<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		<div class="section">
			<div class="content">
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
				</div>

 		</div>
	</main>
	
<?php
get_footer();
