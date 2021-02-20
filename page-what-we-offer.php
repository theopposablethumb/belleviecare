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
				<?php 
				/* if ( !$pagename && $id > 0 ) { // If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
  					$post = $wp_query->get_queried_object();
  					$pagename = $post->post_name;
				};
				$page = str_replace("-", " ", $pagename);
				echo '<h4 class="breadcrumb">' . ucfirst($page) . '</h4>'; */
				
				 while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
			</div>
		</div>
		
		<div class="section">
			<div class="content flex">
			<?php
				// The Query
				$queryValues = new WP_Query( array( 'post_type' => 'services', 'category_name' => 'what-we-offer', 'posts_per_page' => 4 ) );
 
				// The Loop
				while ( $queryValues->have_posts() ) {
    				$queryValues->the_post();
    				echo '<article class="quarters whitebg services"><div class="image">';
    				echo the_post_thumbnail();
					echo '</div><h4>' . get_the_title() . '</h4>';
					echo the_content();
    				echo '<a class="chevron" href="' . get_field( 'link_to_page' ) . ' ">' . get_field('link_text') . '</a></article>';
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
			
			<div class="section dark">		
 				<div class="content">
 					<h2 class="light">Call our team today to discuss how a tailored care package could help you and your loved ones.</h2>
 					<a class="button light" href="tel: 01235 355 570">Call us</a>
 				</div>
 			</div>
 			<div class="section">
 				<div class="content compare">
 					<h2>See how we compare</h2>
 					<div class="left">
 						<img class="shadow" src="/wp-content/uploads/2020/10/checklist.png" />
 					</div>
 					<div class="left">
 						<p>So how do we compare? Our customers have told us they have a criteria in mind before choosing a home care provider. We want to help you make the right decision. So here’s a handy checklist to make sure you’re asking the right questions. </p>
 						<a class="button ghost" href="/wp-content/uploads/2020/12/BelleVie-Checklist-SE.pdf">Download our checklist</a>
 					</div>
 				</div>
 			</div> 
 			
 			<div class="section">
				<div class="content compare">
					<?php dynamic_sidebar( 'row-1'); ?>
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
				<a class="button light" href="/contact">Get in touch</a>
				</div>
			</div>
			
			<div class="section"> 
				<div class="content flex">
					<?php dynamic_sidebar( 'row-4'); ?> 
				</div>
			</div>

	</main>


<?php
get_footer();