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
 					<h2>If now isn’t a good time…</h2>			
 					<div class="textwidget">
 						<p>Leave your details below and one of our care experts will contact you at a time that suits you.</p>
						
						<form class="content rounded border hspot" action="<?php echo get_template_directory_uri(); ?>/form.php" data-form="0da9c75a-63e6-43b2-95b1-d2642aeb8a80">
							<label for="firstname">First Name</label>
							<input type="text" id="firstname" name="firstname" required class="border rounded" placeholder="Please enter your first name">
							
							<label for="lastname">Last Name</label>
							<input type="text" id="lastname" name="lastname" required class="border rounded" placeholder="Please enter your surname">
							
							<label for="email">Email</label>
							<input type="email" id="email" name="email" required class="border rounded" placeholder="Please enter your email address">
							
							<label for="mobilephone">Phone number</label>
							<input type="tel" id="mobilephone" name="mobilephone" required class="border rounded" placeholder="Example 07123456789">
							
							<label for="zip">Postcode</label>
							<input type="text" id="zip" name="zip" required class="border rounded" placeholder="Please enter your postcode">
							
							<label for="message">When should we call you?</label>
							<textarea name="message" class="border rounded" rows="5" columns="70" placeholder="Let us know when we should call you, and let us know if there's anything specific you want us to know"></textarea>
							<div class="g-recaptcha" data-sitekey="6Lejvd8ZAAAAAO5PbIUn5ofoIByWu86dj1yHHotH"></div>
							<input type="submit" value="Submit" class="button light">
							<p class="small">By submitting your details you are consenting to be contacted by BelleVie. Click here to read our <a href="/privacy-policy">privacy policy.</a></p>
							<p class="small">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</p>
						</form>
					</div>
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