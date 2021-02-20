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
			<div class="promo shadow">
				<p>Download our brochure today to learn more about BelleVie. <a>Download</a></p>
			</div>
		</div>
		<div class="section notifications">
			<div class="content">
				<p>Considering your home care options? Download our brochure today to learn more about BelleVie. <a class="button dark">Download</a></p>
			</div>
		</div>
		<div class="banner hidden">
				<?php $postName = $post->post_name; //Get the slug of the current page
				$currentPage = substr($postName, 0, strrpos($postName, '-')); ?>
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

		<div class="section whitebg">
			<div class="content flex centered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
		</div>
		<div class="section notifications" style="margin-top: 2em;">
			<div class="content">
				<p>Considering your home care options? Download our brochure today to learn more about BelleVie. <a>Download</a></p>
			</div>
		</div>

		
		<div class="section whitebg">
			<div class="content flex justifyLeft">
			<?php
				
				
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'values', 'category_name' => $currentPage, 'order' => 'ASC', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="quarters centered border rounded values"><div class="image">';
					echo the_post_thumbnail();
					echo '</div><h3>' . get_the_title() . '</h3>';
    				echo the_content() . '</article>';;
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
			
			<div class="section whitebg">		
				<div class="content flex">
 					<?php dynamic_sidebar( 'row-1'); ?>
 				</div>
 			</div> 
		
		<div class="section">
			<div class="content flex justifyCenter">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'services', 'category_name' => 'global', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo '<article class="quarters rounded whitebg services icons">'; 
    				echo the_post_thumbnail();
    				echo '<h4>' . get_the_title() . '</h4>';
    				echo the_content();
					echo '<a class="button ghost" href="' . get_field( 'link_to_page' ) . ' ">Learn more</a></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
			
			<div class="section whitebg">
				
				<?php
				//Now we have child pages for Oxforshire, we need to adjust variables for the query. This if statement checks if the page is a parent, and if it is then gets the appropriate parent slug and then adjusts it to use as a category name.
				//Wordpress doesn't like retrieving the a parent if the parent page is itself a child, so this requires use of a custom function in functions.php, and relies on the page ID being specified :(
				//Wordpress is supposed to be the friendly CMS but of all my years using Drupal I think I've written more code to make wordpress do useful stuff than any other CMS. Anyway, onwards...
				if ( is_child(93) ) {
					$postName = get_post($post->post_parent); //Get the slug of the current page
					$parentPage = $postName->post_name; 
					$currentPage = substr($parentPage, 0, strrpos($parentPage, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
					echo '<p>Shitballs' . $currentPage . '</p>';
				} else {
					$postName = $post->post_name; //Get the slug of the current page
					$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
				}
				// The Query
				
				$catTitle = ucwords(str_replace("-"," ", $currentPage));
				$queryNews = new WP_Query( array( 'category_name' => $currentPage, 'post_type' => 'post', 'posts_per_page' => 3 ) ); //magic!

				if ( $queryNews->have_posts() ) :
					echo '<div class="content"><h2 class="large green">The latest news from BelleVie Care ' . $catTitle . '</h2></div>';
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
			</div>
			
			<div class="section whitebg">
				<div class="content flex">
					<?php dynamic_sidebar('reviews'); ?> 
				</div>
			</div>
			
			<div class="section">
				<div class="content flex">
					<?php dynamic_sidebar( 'row-2'); ?> 
				</div>
			</div>
			
			<div class="section local">
				<div class="content">
				<?php
				if ( is_child(93) ) {
    				echo '<h2>We offer Wellbeing Support throughout the South Oxfordshire area</h2><p>We have several well established teams suporting people throughout South East Oxfordshire. See our <a href="/locations/south-oxfordshire-homecare">South Oxfordshire page</a> for a full list of areas we cover</p>';
    			} else if ($currentPage === 'northumberland') {
    				
    			} else {
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
					} ?>
				</div>
		</div>
			<div class="section whitebg">
				<div class="content centered">
					<?php dynamic_sidebar( 'row-3'); ?>
					<div class="fullWidth border offwhitebg flex cta">
						<div>
						<div class="image">
							<img src="/wp-content/uploads/2020/09/generations-knitting-together2-scaled-e1602407413173.jpg" alt="two women sitting and knitting together" />
						</div>
						</div>
					<div>
						<h2>Ready to get started?</h2>
						<p>Our team is happy to answer your questions. Get in touch now or arrange a time that suits you best.</p> 
						<?php 
						if ( is_child(93) ) {
							$postName = get_post($post->post_parent); //Get the slug of the current page
							$parentPage = $postName->post_name; 
							$currentPage = substr($parentPage, 0, strrpos($parentPage, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
						} else {
							$postName = $post->post_name; //Get the slug of the current page
							$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
						}
						if (strpos($currentPage, 'oxford') !== false) {
							echo '<a class="button light" href="tel: 01235 355 570">Call 01235 355 570</a>';
						} else {
							echo '<a class="button light" href="tel: 0191 313 0189">Call 0191 313 0189</a>';
						} ?>
					</div>
				</div>
				</div>
			</div>

	</main>


<?php
get_footer();