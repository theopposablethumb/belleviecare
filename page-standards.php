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
		
		<div class="section">
			<div class="content flex">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
			</div>

			<div class="content flex relative">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'services', 'order' => 'ASC', 'category_name' => 'our-standards', 'posts_per_page' => -1 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				$unfiltered_content = str_replace( '<!--more-->', '', $post->post_content );
    				echo '<article class="flex whitebg border rounded standards"><div><h2 class="small">' . get_the_title() . '</h2>';
    				echo the_excerpt() . '<p><a class="open">Read more</a></p></div>';
    				echo '<div><div class="image">';
    				echo the_post_thumbnail() . '</div></div>';
    				echo '<section class="modal shadow rounded hidden"><h2>' . get_the_title() . '</h2>';
    				echo '<p>' . $unfiltered_content . '</p><a class="close">Close</a></section></article>';
				}
				wp_reset_postdata(); ?>
				</div>
				
			</div>

	</main>


<?php
get_footer();