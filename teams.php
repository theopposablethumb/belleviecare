<?php
/**

Template Name: Teams template
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
		</div>
		
		<div class="section">		
				<div class="content flex">
 					<?php dynamic_sidebar( 'row-1'); ?>
 				</div>
 		</div> 
		
		<div class="section">
			<div class="content centered">
				<h2 class="light">Here are some of the people who make BelleVie</h2>
			</div>
			<div class="content flex justifyCenter">
			<?php
				// The Query
				$postName = $post->post_name; //Get the slug of the current page
				$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
				$queryValues = new WP_Query( array( 'post_type' => 'colleague', 'category_name' => $currentPage, 'posts_per_page' => -1 ) ); //magic!
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				
    				$imageID = get_field('profile_pic');
					$image = wp_get_attachment_image_src( $imageID, 'full' );
					$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
					echo '<article class="quarters border rounded staff"><div class="image"><img src="' . $image[0] . '" alt="' . $alt_text . '" /></div>';
    				echo '<div><h4>' . get_field('staff_name') . '</h4>';
    				echo '<p class="jobTitle">' . get_field('job_title') . '<p>';		
    				if(get_field('profile')) { echo '<p class="hidden">' . get_field('profile') . '</p></div>'; }
					echo '</article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>

	</main>


<?php
get_footer();