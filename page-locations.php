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
		<div class="section hero">
			<div class="content flex">
				<?php dynamic_sidebar( 'hero'); ?>
			</div>
		</div>
		
		<div class="section">
			<div class="content flex centered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
		</div>
					
			<div class="section">		
 				<?php dynamic_sidebar( 'row-1'); ?>
 			</div> 
		
		<div class="section">
				<?php dynamic_sidebar( 'row-2'); ?> 
		</div>
			
			<div class="section">
				<?php dynamic_sidebar( 'row-3'); ?>
			</div>
			
			<div class="section"> 
				<?php dynamic_sidebar( 'row-4'); ?> 
			</div>

	</main>


<?php
get_footer();