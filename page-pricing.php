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
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
			</div>
		</div>
					
		<div class="section">
			<div class="content">
				<?php dynamic_sidebar( 'row-3'); ?>
			</div>
		</div>
		
		<div class="section dark">
			<div class="content">
				<?php dynamic_sidebar( 'row-2'); ?>
			</div>
		</div>
			
			
		<div class="section">
			<div class="content">
				<h2 class="large green">How we tailor our packages to our customers needs</h2>
			</div>
			<div class="content flex">
						<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'story', 'category_name' => 'pricing', 'order' => 'ASC', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				
    				$imageID = get_field('story_image');
					$image = wp_get_attachment_image_src( $imageID, 'full' );
					$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
					echo '<article class="border rounded story flex">';
					echo '<div class="halves"><img src="' . $image[0] . '" alt="' . $alt_text . '" /></div><div class="halves">';
    				echo the_content();
    				echo '</div></article>';
				}
				wp_reset_postdata(); ?>
			</div>
		</div>
					
			<div class="section">
				<div class="content">
	 				<?php dynamic_sidebar( 'row-1'); ?>
 				</div>
 			</div> 
			
			<div class="section"> 
				<?php dynamic_sidebar( 'row-4'); ?> 
			</div>

	</main>


<?php
get_footer();