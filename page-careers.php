<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		<div class="section whitebg">
			<div class="content flex cms-page">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
		</div>
			
			<div class="section whitebg">		
				<div class="content flex">
 					<?php dynamic_sidebar( 'row-3'); ?>
 				</div>
 			</div> 
		
		<div class="section">
			<div class="content">
				<h2 class="large light">Current opportunities</h2>
			</div>
			<div class="content flex justifyCenter">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'job', 'posts_per_page' => -1 ) );
 
 			if ( $queryServices->have_posts() ) {
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo '<article class="rounded whitebg border job">'; 
    				echo '<div class="flex"><h3>' . get_field('job_title') . '</h3>';
    				echo '<div><p><strong>Location</strong></p><p>' .get_field('location') . '</p></div><img src="' . get_template_directory_uri() . '/icons/open-green.svg" height="32px" width="32px" /></div><div class="hidden">';
    				echo the_content();
    				echo '<div class="centered"><a class="button light centered" target="_blank" href="' . get_field('hr_partner_link') . '">Apply now</a></div></div></article>';
				}
			} else {
				echo '<article><p>We currently do not have any open positions, but will be recruiting again in County Durham and Oxfordshire soon!</p></article>';
			}
				wp_reset_postdata(); ?>
				</div>
			</div>

	</main>


<?php
get_footer();