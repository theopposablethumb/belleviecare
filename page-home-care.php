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
 			</div>
 			<div class="section dark">
				<div class="content">
					<div class="widget_text content flex centered padded">
						<h2 class="large">How BelleVie’s costs compare to other types of care in the North East</h2>
						<div class="textwidget custom-html-widget">
							<table>
								<tbody>
									<tr>
										<th></th>
										<th><h4>Bellevie</h4></th>
										<th><h4>Care Home</h4></th>
									</tr>
									<tr>
										<td><p class="small">Average Monthly Cost</p></td>
										<td><p>~£1600*</p></td>
										<td><p>£2700**</p></td>
									</tr>
									<tr>
										<td colspan="4">
											<p class="small">*Pricing is for approx. 2 visits a day, seven days a week. BelleVie's figures can vary depending on needs.</p>
											 <p class="small">**Source: Fees paid by self-funders: LaingBuisson surveys of care homes 2018-19, County Durham</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="section">
 				<div class="content">
					<p style="margin-bottom: 2em;">If you are unsure about which type of care is best for you, contact us today to speak to a member of our team. If you would prefer to discuss your needs in person, you can book a free, initial conversation with one of our Trusted Assessors at a day and time that suits you. They can advise you on your care options, set your mind at ease, and talk about how we can support. </p>
				</div>
 			</div>
 			
 		<div class="section whitebg">
			<div class="content padded">
				<h2 class="light">Talk to us to find out how we can support you</h2>	
				<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'branch', 'order' => 'ASC', 'posts_per_page' => -1 ) );
 
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