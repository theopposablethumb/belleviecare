<?php
/**

Template Name: Products and Services
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
		<div class="section">
			<div class="content flex centered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>

			<div class="section dark">		
 				<div class="content">
 					<h2 class="light">No matter what you need to thrive at home, we can help. Contact us today to discuss your needs and aspirations.</h2>
 					<a class="button light" href="tel: 01235 355 570">Call us</a>
 				</div>
 			</div>

		<div class="section">
				<div class="content flex">
				<?php				
					// The Query
					$queryValues = new WP_Query( array( 'post_type' => 'story','category_name' => 'products-case-studies', 'posts_per_page' => 3 ) );
 
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
		
	</main>


<?php
get_footer();