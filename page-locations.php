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
	<div class="section notifications">
			<div class="content">
				<p>Considering your home care options? Download our brochure today to learn more about BelleVie. <a>Download</a></p>
			</div>
		</div>
		<div class="banner hidden">
			<form class="content rounded border hspot">
					<h2 class="light green">Considering your home care options?</h2>
					<p>Download our brochure today to learn more about BelleVie.</p>
					<label for="firstname">First Name</label>
					<input type="text" id="firstname" name="firstname" required class="border rounded" placeholder="Please enter your first name">
					<label for="lastname">Last Name</label>
					<input type="text" id="lastname" name="lastname" required class="border rounded" placeholder="Please enter your surname">
					<label for="phone">Phone number</label>
					<input type="tel" id="phone" name="phone" required class="border rounded" placeholder="Example 07123456789">
					<input type="submit" value="Download now" class="button light">
					<p class="small">By submitting your details you are consenting to be contacted by BelleVie. Click here to read our <a href="/privacy-policy">privacy policy.</a></p>
					<a class="close">Close</a>
				</form>
		</div>

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