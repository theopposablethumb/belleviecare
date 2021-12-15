<?php
/**

Template Name: Younger People
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>
<?php /*  */ ?>

	<main>
		<div class="section hero">
			<div class="content flex">
				<?php dynamic_sidebar( 'hero'); ?>
			</div>
		</div>
		<div class="section notifications">
			<div class="content">
				<p>Considering your support options? Download our brochure today to learn more about BelleVie. <a class="button dark">Download</a></p>
			</div>
		</div>
		<div class="banner hidden">
			<?php $postName = $post->post_name; //Get the slug of the current page
				$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name ?>
			<form class="content rounded border hspot" data-form="a5b30c32-7d7d-420e-b9a8-ee9c35f6f2dd">
				<h2 class="light green">Considering your home care options?</h2>
				<p>Download our brochure today to learn more about BelleVie.</p>
				<label for="firstname">First Name</label>
				<input type="text" id="firstname" name="firstname" required class="border rounded" placeholder="Please enter your first name">
				<label for="lastname">Last Name</label>
				<input type="text" id="lastname" name="lastname" required class="border rounded" placeholder="Please enter your surname">
				<label for="mobilephone">Phone number</label>
				<input type="tel" id="mobilephone" name="mobilephone" required class="border rounded" placeholder="Example 07123456789">
				<input type="hidden" id="area" name="area" value=<?php echo $currentPage; ?> >
				<div class="g-recaptcha" data-sitekey="6Lejvd8ZAAAAAO5PbIUn5ofoIByWu86dj1yHHotH"></div>
				<input type="submit" value="Download now" class="button light">
				<p class="small">By submitting your details you are consenting to be contacted by BelleVie. Click here to read our <a href="/privacy-policy">privacy policy.</a></p>
					<p class="small">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</p>
				<a class="close">Close</a>
			</form>
		</div>

		<div class="section">
			<div class="content flex centered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
 				
 				
  			<div class="section">
				<div class="content flex">
			<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'services', 'category_name' => 'younger-people', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="quarters whitebg services"><div class="image">';
    				echo the_post_thumbnail();
					echo '</div><h4>' . get_the_title() . '</h4>';
					echo the_content(). '</article>';
				}
				wp_reset_postdata(); ?>
				</div>

			</div>
			
			<div class="section">		
			<div class="content flex centered">
 				<?php dynamic_sidebar( 'row-1'); ?>
 			</div>
 		</div> 
			
			<div class="section whitebg">
			<div class="content centered">
				<h2 class="light">Booking a free consultation is easy!</h2>
			</div>
			<div class="content flex">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'steps', 'orderby' => 'ID', 'order' => 'ASC', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo '<article class="thirds border whitebg rounded steps"><p class="small">' . get_field( 'step' ) . '</p>';
    				echo '<h4>' . get_the_title() . '</h4>';
    				echo the_content() . '</article>';
				}
				wp_reset_postdata(); ?>				
				</div>
			</div>

			<div class="section whitebg">
				<div class="content">
					<div class="fullWidth flex callUs">
					<div>
						<div class="image shadow">
						<img src="https://www.belleviecare.co.uk/wp-content/uploads/2021/01/Jill.jpg" />
						</div>
					</div>
					<div>
						<h2 class="green">Book your free consultation</h2>
						<p>Speak to Jill to find out how BelleVie can support you to live your best life</p>
						<a class="phone" href="tel: 01235 355 570">01235 355 570</a>
					</div>
				</div>

				</div>
			</div>
 			
 		
		<div class="section">
				<div class="content flex">
				<?php				
					// The Query
					$queryValues = new WP_Query( array( 'post_type' => 'story','category_name' => 'younger-people', 'posts_per_page' => 3 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				global $post;
    				$slug = $post->post_name;
    				$image = get_field('story_image');
    				echo '<article class="imageLeft flex border rounded whitebg">';
    				echo '<div class="image">' . wp_get_attachment_image( $image, 'full' ) . '</div>'; 
					echo '<div><h3>' . get_the_title() . '</h3>';
    				echo the_excerpt();
    				echo '<a class="button ghost" href=' . get_permalink() . '>Read more here</a></div></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
		
	</main>


<?php
get_footer();