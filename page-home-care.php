<?php
/**

Template Name: Home care
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>
<?php /*  */ ?>

	<main>
		
		<div class="section">
			<div class="content flex">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
 				<div class="content padded">
 					<div class="border rounded tailored">
						<h2 class="green light">Benefits of Home Care vs Care Home</h2>
						<ul>
 							<li>High quality, one to one care</li>
 							<li>Personalised support</li>
 							<li>Familiar surroundings</li>
 							<li>Visits from friends and family anytime</li>
 							<li>Stay in your local community</li>
 							<li>Couples continue living together</li>
 							<li>Keep your pets with support to look after them</li>
 							<li>Companionship as well as practical care</li>
						</ul>
					</div>
 				</div>
 				<div class="content">
					<p style="margin-bottom: 2em;">If you are unsure about which type of care is best for you, contact us today to speak to a member of our team. If you would prefer to discuss your needs in person, you can book a free, initial conversation with one of our Trusted Assessors at a day and time that suits you. They can advise you on your care options, set your mind at ease, and talk about how we can support. </p>
				</div>
 			</div>
 			
 		<div class="section whitebg">
			<div class="content padded">
				<h2 class="light">Talk to us to find out how we can support you</h2>	
				<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'branch', 'meta_key' => 'contact_us', 'meta_value' => true, 'order' => 'ASC', 'posts_per_page' => -1 ) );
 
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
				<div class="content flex">
				<?php				
					// The Query
					$queryValues = new WP_Query( array( 'post_type' => 'story','category_name' => 'home-care', 'posts_per_page' => 2 ) );
 
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