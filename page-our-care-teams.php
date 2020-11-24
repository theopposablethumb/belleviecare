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
		</div>
		
		<div class="section">
			<div class="content flex justifyLeft">
			<?php
				function seoUrl($string) {
 				   //Lower case everything
    				$string = strtolower($string);
    				//Make alphanumeric (removes all other characters)
    				$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    				//Clean up multiple dashes or whitespaces
    				$string = preg_replace("/[\s-]+/", " ", $string);
    				//Convert whitespaces and underscore to dash
    				$string = preg_replace("/[\s_]/", "-", $string);
    				return $string;
				};
				
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'branch', 'order' => 'ASC', 'posts_per_page' => 2 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo '<article class="shadow rounded flex whitebg branchTeam"><div><h2 class="large light"><a href="' . seoUrl(get_the_title()) . '-team">' . get_the_title() . '</a> teams</h2></div><div class="image">';
    				echo the_post_thumbnail() . '</div></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>

	</main>


<?php
get_footer();