<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

?>
	<article>
	<?php belleviecare_post_thumbnail(); ?>
	<?php the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'belleviecare' ),
				'after'  => '</div>',
			)
		);
		?>
</article>
	<?php if ( get_edit_post_link() ) : edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'belleviecare' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
	<?php endif; ?>
<!-- #post-<?php the_ID(); ?> -->
