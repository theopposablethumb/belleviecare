<?php
/**

Template Name: Exercise and Fitness
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>
<?php /*  */ ?>

	<main>
		<div class="section dark">
				<div class="content">
					<h2 class="light large">Book your complimentary fitness session*</h2>
					<p>Please leave your name and email below and we will contact you to organise a day and time suitable for you.</p>
					<form class="content rounded border hspot" data-form="cb310c4d-38d9-4d64-affb-aba244dc7e2b">
						
						<label for="firstname">First Name</label>
						<input type="text" id="firstname" name="firstname" required class="border rounded" placeholder="Please enter your first name">
						<label for="lastname">Last Name</label>
						<input type="text" id="lastname" name="lastname" required class="border rounded" placeholder="Please enter your surname">
						<label for="mobilephone">Email</label>
						<input type="email" id="email" name="email" required class="border rounded" placeholder="Please enter your email address">
						<div class="g-recaptcha" data-sitekey="6Lejvd8ZAAAAAO5PbIUn5ofoIByWu86dj1yHHotH"></div>
						<input type="submit" value="Submit" class="button light">
						<p class="small">By submitting your details you are consenting to be contacted by BelleVie. Click here to read our <a href="/privacy-policy">privacy policy.</a></p>
						<p class="small">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</p>
					</form>
				</div>
			</div>
		
		<div class="section">
			<div class="content">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
			</div>
			
			<div class="section notifications">
				<div class="content">
				<p><strong>COVID-19 notice:</strong> We are using the necessary protective equipment and are adhering to the latest government guidelines.</p><p>Our experienced trainers are also tested on a regular basis. <a href="/covid-19">Here's what we're doing in response to Covid-19</a></p>
				</div>
			</div>
			
			<div class="section whitebg">
				<div class="content">	
					<?php dynamic_sidebar( 'row-1'); ?>
				</div>
			</div>
			<div class="section">
				<div class="content">	
					<?php dynamic_sidebar( 'row-4'); ?>
				</div>
			</div>
			<div class="section">
				<div class="content">
					<p class="small">*This offer is valid between 1st December 2020 and 31st January 2021 and only available for those living in County Durham or Tyne and Wear.. BelleVie Care Ltd reserves the right to cancel your programme at any time for any reason deemed necessary. An initial consultation session will be made free of charge. If you do not wish to proceed following the initial consultation, you are under no obligation to continue the programme and no payment will be taken. In order to continue the programme, payment will be required in full following the initial consultation session. If you wish to cancel your programme, any payments already made to BelleVie Care Ltd will not be refunded. Full terms and conditions will be provided.</p>
				</div>
			</div>
	</main>


<?php
get_footer();