<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

?>

<?php 
	if ( is_singular() ) : ?>
	<article>
		<?php
		the_title( '<h1>', '</h1>' ); ?>
		<section class="meta">
			<?php belleviecare_posted_on(); ?>
	 	</section>
		<?php 	the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'belleviecare' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<footer>
			<?php 
				belleviecare_posted_by(); 
				belleviecare_entry_footer();?>
		</footer>
	</article>

			
		<?php else : ?>
		<article <?php post_class('thirds border whitebg rounded');  ?> >
			<?php belleviecare_post_thumbnail();
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'belleviecare' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'belleviecare' ),
				'after'  => '</div>',
			)
		);
		endif; ?>
</article>
