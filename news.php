<?php
/**

Template Name: News template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

get_header();
?>

	<main>
		<div class="section">
			<div class="content">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				wp_reset_postdata(); ?>
			</div>
		</div>
		
			<?php 
				$stickies = get_option( 'sticky_posts' );
				if ( $stickies ) {
    				$args = ['post_type' => 'post', 'post__in' => $stickies, 'posts_per_page' => 2, 'ignore_sticky_posts' => 1 ];
    				$the_query = new WP_Query($args);

					echo '<div class="section dark"><div class="content">';
    				if ( $the_query->have_posts() ) { 
        				while ( $the_query->have_posts() ) { 
            				$the_query->the_post();
            				echo '<article class="sticky flex"><div><div class="image">';
							echo the_post_thumbnail();
							echo '</div></div><div>';
							echo the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							echo belleviecare_posted_on();
							echo the_content();
							echo '</div></article>';
        				}
        			wp_reset_postdata();    
    				}
					echo '</div></div>';
				} ?>
		<div class="section">
			<div class="content flex news">
				<?php
    				$args = array(
        				'post_type' => 'post',
        				'post_status' => 'publish',
        				'category_name' => 'news',
        				'posts_per_page' => '9',
        				'paged' => 1
    				);
    				$news_posts = new WP_Query( $args );
    			?>
 
    			<?php if ( $news_posts->have_posts() ) :
            		while ( $news_posts->have_posts() ) : $news_posts->the_post();
						echo '<article class="thirds border whitebg rounded"><div class="image">';
						echo the_post_thumbnail();
						echo '</div>';
						echo the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						echo belleviecare_posted_on();
						echo the_content();
						echo '</article>';
          		 	endwhile; 
          		 	endif; ?>
          		 	
			</div>
			<div class="content">
				<p class="button light loadmore"/>View more news from BelleVie</p>
			</div>
		</div>
		
		<div class="section">		
				<div class="content flex">
 					<?php dynamic_sidebar( 'row-1'); ?>
 				</div>
 		</div> 
 </main>


<?php
get_footer();