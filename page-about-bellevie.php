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
			<div class="section">
				<div class="content flex">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
			</div>
		
			<div class="section">
				<div class="content">
					<h2 class="large green">Our Central Team</h2>
				</div>
				<div class="content flex">
				
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'colleague', 'order' => 'ASC', 'category_name' => 'central', 'posts_per_page' => -1 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
   
					$imageID = get_field('profile_pic');
					$image = wp_get_attachment_image_src( $imageID, 'full' );
					$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
					echo '<article class="quarters border rounded staff"><div class="image"><img src="' . $image[0] . '" alt="' . $alt_text . '" /></div>';
    				echo '<h4>' . get_field('staff_name') . '</h4>';
    				echo '<div><p class="jobTitle">' . get_field('job_title') . '<p>';		
    				echo '<p class="hidden">' . get_field('profile') . '</p></div></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
		
	</main>


<?php
get_footer();