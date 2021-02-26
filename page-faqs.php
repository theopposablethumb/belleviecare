<?php
/**
Template Name: FAQs
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		
		<div class="section">
			<div class="content">
				<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
				wp_reset_postdata(); ?>
			</div>
		</div>
		
		<div class="section">
			<div class="content">
			<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'faq', 'posts_per_page' => -1 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="faq border rounded closed"><h2 class="small">' . get_the_title() . '</h2>';
    				echo the_content() . '<img src="' . get_template_directory_uri() . '/icons/open-green.svg" height="32px" width="32px" /></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>

		<div class="section contactTile">
			<div class="content">
				<h2>How to get in touch</h2>
			</div>
			<div class="content flex">	
				<div class="thirds shadow centered">
					<h4>By Phone</h4>
					<p>Oxfordshire - <a href="tel:01235355570">01235 355 570</a></p>
					<p>North East - <a href="tel:01913130189">0191 313 0189</a></p>
				</div>
				<div class="thirds shadow centered">
					<h4>By Email</h4>
					<p><a href="mailto:info@belleviecare.co.uk">info@belleviecare.co.uk</a> </p>
				</div>
				<div class="thirds shadow centered">
					<h4>Contact form</h4>
					<p>Use our <a href="/contact-us">online Contact Us form to get in touch </a> with one of our team.</p>
				</div>
			</div>
		</div>
		
	</main>


<?php
get_footer();