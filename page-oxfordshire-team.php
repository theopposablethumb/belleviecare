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
			<div class="content">
				<?php dynamic_sidebar( 'hero'); ?>
			</div>
		</div>
		
		<div class="section">
			<H1>
				 TEST
			</H1>
			<div class="content flex centered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
		</div>
		
			
			<div class="section">		
				<div class="content flex">
 					<?php dynamic_sidebar( 'row-1'); ?>
 				</div>
 			</div> 
		
		<div class="section">
			<div class="content flex">
				<?php dynamic_sidebar( 'row-2'); ?> 
			</div>
		</div>
		
		<div class="section">
			<div class="content flex">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'colleague', 'category_name' => 'oxfordshire', 'posts_per_page' => -1 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
   
					$imageID = get_field('profile_pic');
					$image = wp_get_attachment_image_src( $imageID, 'full' );
					$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
					
					echo '<img src="' . $image[0] . '" alt="' . $alt_text . '" />';
    				echo '<h2>' . get_field( 'staff_name' ) . '</h2>';
    				echo '<p>' . get_field( 'job_title' ) . '</p>';
    				if(get_field('profile')) { echo '<p class="hidden">' . get_field('profile') . '</p></div>'; }
					echo '</article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
			
			<div class="section">
				<div class="content flex">
					<?php dynamic_sidebar( 'row-3'); ?>
				</div>
			</div>
			
			<div class="section"> 
				<div class="content flex">
					<?php dynamic_sidebar( 'row-4'); ?> 
				</div>
			</div>

	</main>


<?php
get_footer();