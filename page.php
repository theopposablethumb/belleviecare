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
		</div>
		
		<div class="section whitebg">
			<div class="content flex centered">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
				</div>
		</div>
		
		<div class="section whitebg">
			<div class="content flex justifyLeft">
			<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'values', 'order' => 'ASC', 'posts_per_page' => 4 ) );
 
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
			<div class="content flex">
				<?php dynamic_sidebar( 'row-2'); ?> 
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
			<div class="section local">
				<div class="content">
				<?php
				// The Query
				$postName = $post->post_name; //Get the slug of the current page
				$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
				$queryValues = new WP_Query( array( 'name' => $currentPage, 'post_type' => 'branch', 'posts_per_page' => 1 ) ); //magic!
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo get_field('areas_served');
				}
				wp_reset_postdata(); ?>
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
						<?php $postName = $post->post_name; //Get the slug of the current page
						if (strpos($postName, 'oxford') !== false) {
							echo '<a class="button light" href="tel: 01235 355 570">Call 01235 355 570</a>';
						} else {
							echo '<a class="button light" href="tel: 01987 654 321">Call 01987 654 321</a>';
						} ?>
					</div>
				</div>
				</div>
			</div>

	</main>


<?php
get_footer();