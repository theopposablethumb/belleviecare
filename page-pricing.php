<?php
/**
Template Name: Pricing
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
		<div class="section whitebg">
			<div class="content padded">
				<h2 class="light">Talk to us to find out how we can support you</h2>	
				<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'branch', 'meta_key'	 => 'contact_us',  'meta_value'	=> true, 'order' => 'ASC', 'posts_per_page' => -1 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="branchListing content flex"><a class="phone" href="tel: ' . get_field('phone_number') . '">' . get_field('phone_number') . '</a>';
    				echo '<p><strong>' . get_field('branch_name') . '</strong></p>';
    				echo '<p>' . get_field('opening_hours') . '</p></article>';
				}
				wp_reset_postdata(); ?>
					<article class="branchListing content flex justifyLeft"><a class="email" href="mailto: info@belleviecare.co.uk">info@belleviecare.co.uk</a><p>Send us an email, we usually respond within 24 hours.</p></article>
					<article class="branchListing"><p>Or request a call back from one of our WellBeing Support experts via our <a href="/contact-us">contact form</a></p></article>
			</div>
		</div>
		
		<div class="section">
			<div class="content">
				<?php dynamic_sidebar( 'row-1'); ?>
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
				<?php dynamic_sidebar( 'row-4'); ?> 
			</div>

	</main>


<?php
get_footer();