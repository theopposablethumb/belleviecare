<?php
/**
 * The template for displaying the home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		<div class="section notifications">
			<div class="content">
		<?php
				// The Query
				$queryServices = new WP_Query( array( 'category_name' => 'notification', 'posts_per_page' => 1 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo the_content();
				}
				wp_reset_postdata(); ?>
			</div>
		</div>
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
    				echo the_content() . '</article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
			
			<div class="section whitebg">		
 				<?php dynamic_sidebar( 'row-1'); ?>
 			</div> 
		
		<div class="section">
				<?php dynamic_sidebar( 'row-2'); ?>
		</div>
		
		<div class="section">
			<div class="content flex justifyLeft">
			<?php
				// The Query
				$queryServices = new WP_Query( array( 'post_type' => 'services', 'category_name' => 'global', 'order' => 'ASC', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryServices->have_posts() ) {
    				$queryServices->the_post();
    				echo '<article class="quarters rounded whitebg services icons">';
    				echo '<h4>' . get_the_title() . '</h4>';
    				echo the_content();
					echo '<a class="button ghost" href="' . get_field( 'link_to_page' ) . ' ">Learn more</a></article>';
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
						<a class="button light" href="/contact-us">Call Us</a>
					</div>
				</div>
				</div>
			</div>

	</main>

<?php
get_footer();
