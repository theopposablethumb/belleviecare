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
	<div class="section">
			<div class="content">
				<h1>Hear from the people we support</h1>
				<p>We take great pride in supporting people to live well at home and in the community. Here are stories of how we make our magic happen.</p>
			</div>
			<div class="content">

		<?php
		while ( have_posts() ) :
			the_post();
    				
    		$image = get_field('story_image');
    				
    		echo '<article class="flex stories"> <div class="halves">' . wp_get_attachment_image( $image, 'full' ) . '</div>';
    		echo '<div class="halves">';
    		echo the_content();
    		echo '<a class="button ghost" href="' . get_field('page_link_1') . '">Back to what we offer</a> <a class="button dark" href="' . get_field('page_link_2') . '">' . get_field('page_link_2_text') . '</a></div></article>';

		endwhile; // End of the loop.
		
		wp_reset_postdata();
		?>
			</div>
		</div>
		
		<div class="section">
			<div class="content">
				<p class="centered">Other stories you might be interested in</p>
			</div>
			<div class="flex content">
		<?php 
		// The Query
		$currentID = get_the_ID();
		$queryValues = new WP_Query( array( 'post_type' => 'story', 'category__not_in' => 12, 'posts_per_page' => -1, 'post__not_in' => array($currentID) ) );
				
		// The Loop
		while ( $queryValues->have_posts() ) {
    		$queryValues->the_post();
    				
    		$imageID = get_field('cover_image');
			$image = wp_get_attachment_image_src( $imageID, 'full' );
			$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
    				
    		echo '<div class="cover stories">';
    		echo '<a href="' . get_post_permalink() . '">';
    		echo '<div class="image"><img src="' . $image[0] . '" alt="' . $alt_text . '" /></div>';
    		echo the_title($before = '<p>', $after = '</p>');
    		echo '</a>';
    		echo '</div>';
		}
		wp_reset_postdata(); ?>

			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
