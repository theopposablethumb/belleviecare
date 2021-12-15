<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		<div class="section news">
		<div class="content">
		<?php
		$postType;
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			dynamic_sidebar( 'row-1');
			$thisPost = get_post_type();
			if ($thisPost == 'job') {$postType = 'job';};
		endwhile; // End of the loop.
		?>
		</div>
		</div>
		<?php
			if ($postType == 'job') {
				$categories = get_the_category();
				$category = $categories[0]->name; 
				
				if ( ! empty( $categories ) ) {
					$queryValues = new WP_Query( array( 'post_type' => 'colleague', 'category_name' => $category, 'posts_per_page' => 4 ) ); //magic!
 				
 					if ($queryValues->have_posts()) :
						echo '<div class="section"><div class="content"><h2 class="light">Meet members of the ' . $category . ' team</h2></div><div class="content flex">';
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
				wp_reset_postdata(); 
				}
				echo '<div class="section whitebg">
					<div class="content">
						<p>At BelleVie Care we want everyone to bring their authentic selves to work. <a href="/about-bellevie/">Find out more about BelleVie Care and our values</a></p>
						<p>Interested in working for us? <a href="/jobs-in-home-care/">View more job vacancies at BelleVie Care</a></p>
					</div>
				</div>';	
			}; 
		?>
	</main><!-- #main -->

<?php
get_footer();
