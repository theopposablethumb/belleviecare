<?php
/**

Template Name: Landing Page
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
		
		<div class="section whitebg">
			<div class="content flex centered">
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
				$queryValues = new WP_Query( array( 'post_type' => 'services', 'category_name' => 'what-we-offer', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="quarters whitebg services"><div class="image">';
    				echo the_post_thumbnail();
					echo '</div><h4>' . get_the_title() . '</h4>';
					echo the_content();
    				echo '<a class="chevron" href="' . get_field( 'link_to_page' ) . ' ">' . get_field('link_text') . '</a></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>

		<div class="section whitebg" id="map" tabindex="1">		
 		</div> 
 		<?php 
				$postName = $post->post_name; //Get the slug of the current page
				$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name

			?>
 		<div class="section whitebg local">
 			<div class="content">
 				<?php
 				echo '<h2>Providing care throughout the following areas</h2>';
				echo $currentPage;
 				// The Query
					$queryValues = new WP_Query( array( 'name' => $currentPage, 'post_type' => 'branch', 'posts_per_page' => 1 ) ); //magic!
					// The Loop
					while ( $queryValues->have_posts() ) {
    					$queryValues->the_post();
    						echo '<div class="tooltip border shadow rounded whitebg hidden"><p>Our team of Wellbeing Support Workers are supporting people in locationName</p>';
							echo '<p>Give us a call on <a href="tel: ' . get_field('phone_number') . '">' . get_field('phone_number') . '</a> to book a free consultation and find out how we can help you</p></div>';
    						echo get_field('areas_served');
						}
						wp_reset_postdata();
						
						$post_data = get_post($post->post_parent);
						$parentSlug = $post_data->post_name;
						echo '<p>We have Wellbeing Support Teams providing care throughout Oxfordshire</p>';
						?>
 			</div>
 		</div>


		<?php
				// The Query
 				$queryValues = new WP_Query( array( 'post_type' => 'colleague', 'category_name' => $currentPage, 'posts_per_page' => -1 ) ); //magic!
				// The Loop
				if ($queryValues->have_posts()) :
					echo '<div class="section"><div class="content centered"><h2 class="light">We value our people - meet your local team in ' . $locTitle . '</h2></div><div class="content flex justifyCenter">';
					while ( $queryValues->have_posts() ) : $queryValues->the_post();
    					$imageID = get_field('profile_pic');
						$image = wp_get_attachment_image_src( $imageID, 'full' );
						$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
						echo '<article class="quarters border rounded staff"><div class="image"><img src="' . $image[0] . '" alt="' . $alt_text . '" /></div>';
    					echo '<div><h4>' . get_field('staff_name') . '</h4>';
    					echo '<p class="jobTitle">' . get_field('job_title') . '<p>';		
    					if(get_field('profile')) { echo '<p class="hidden">' . get_field('profile') . '</p></div>'; }
						echo '</article>';
					endwhile;
					echo '</div></div>';
				endif;
				wp_reset_postdata(); ?>
		
	<div class="section whitebg">
				<?php $postName = $post->post_name; //Get the slug of the current page
				// The Query
				
				$queryNews = new WP_Query( array( 'category_name' => $currentPage, 'post_type' => 'post', 'posts_per_page' => 3 ) ); //magic!

				if ( $queryNews->have_posts() ) :
					echo '<div class="content"><h2 class="large green">The latest news from BelleVie Care ' . $locTitle . '</h2></div>';
					echo '<div class="content news">';
    				while ( $queryNews->have_posts() ) : $queryNews->the_post();
        				echo '<article class="thumb flex rounded border offwhitebg"><div class="image">';
						echo the_post_thumbnail();
						echo '</div><div>';
						echo the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						echo '<p class="small">Posted on ' . get_the_date() . ' by ' . get_the_author_meta('display_name') . '</p>';
						echo '</div></article>';
        			endwhile; 
        			echo '</div>';
    			endif;
    			wp_reset_postdata();
				?>
		</div>
		<div class="section">
			<div class="content">
				<?php dynamic_sidebar('reviews'); ?> 
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
			
			<div class="section dark contact">		
				<div class="content">
 					<h2>If now isn’t a good time…</h2>			
 					<div class="textwidget">
 						<p>Leave your details below and one of our care experts will contact you at a time that suits you.</p>
						
						<form class="content rounded border hspot" data-form="0da9c75a-63e6-43b2-95b1-d2642aeb8a80">
							<label for="firstname">First Name</label>s
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

	</main>


<?php
get_footer();