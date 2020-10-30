<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		
		<div class="section">
			<div class="content flex cenrtered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
		</div>
		
		<div class="section">
			<div class="content flex">
			<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'branch', 'order' => 'ASC', 'posts_per_page' => -1 ) );
 
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
			
			<div class="section dark contact">		
				<div class="content">
 					<?php dynamic_sidebar( 'row-1'); ?>
 				</div>
 			</div> 
 			
 			<div class="section contact">		
				<div class="content">
					<h1>Bren HubSpot playing</h1>
					<form action="<?php echo get_template_directory_uri(); ?>/hubspot.php" method="post">
						<!-- https://www.tutorialrepublic.com/php-tutorial/php-form-handling.php -->
						
						<label for="firstname">First Name</label>
   						<input type="text" name="firstname" id="firstname" placeholder="Please enter your first name">
    					
    					<label for="lastname">Last Name</label>
     					<input type="text" name="lastname" id="lastname" placeholder="Please enter your last name">
    					
    					<label for="email">Email</label>
    					<input type="text" name="email" id="email" placeholder="Please enter your email address">
    					
    					<label for="mobilephone">Phone number</label>
    					<input type="text" name="mobilephone" id="mobilephone" placeholder="Example: 07123456789">
    					
    					<label for="zip">Where do you need support?</label>
    					<input type="text" name="zip" id="zip" placeholder="Please enter your postcode">
    					
    					<label for="message">When should we call you?</label>
    					<textarea name="message" id="message" placeholder="Let us know when we should call you, and let us know if there's anything specific you want us to know"></textarea>
    					<input type="submit" />
					</form>
 				</div>
 			</div> 
		
		<div class="section">
			<div class="content">
				<h2 class="large">What happens next</h2>
			</div>
			<div class="content flex">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'steps', 'orderby' => 'ID', 'order' => 'ASC', 'posts_per_page' => 3 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo '<article class="thirds border rounded steps"><p class="small">' . get_field( 'step' ) . '</p>';
    				echo '<h4>' . get_the_title() . '</h4>';
    				
    				echo the_content() . '</article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>

	</main>


<?php
get_footer();