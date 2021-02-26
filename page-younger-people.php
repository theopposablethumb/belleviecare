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
		
		<div class="section">
			<div class="content flex">
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
			
			<div class="section dark">		
 				<div class="content">
 					<h2 class="light">Call our team today to find out more about how we can support.</h2>
 					<a class="button light" href="tel: 01235 355 570">Call us</a>
 				</div>
 			</div>
 			
 		
		<div class="section">
				<div class="content flex">
				<?php				
					// The Query
					$queryValues = new WP_Query( array( 'post_type' => 'story','category_name' => 'younger-people', 'posts_per_page' => 2 ) );
 
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