<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellevie_Care
 */

?>

	<?php if ('job' == get_post_type() ) : ?>
		<?php
			$salary =   get_field('salary');
			$formatSalary = number_format ($salary, 0, '.' , ',' );
			$salaryTyle = strtolower(get_field('salary_type'));
		?> 
		<article class="job full">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<section class="meta">
				
				<p>Location: <strong><?php echo get_field('location') ?></strong></p>
				<p>Salary: <strong>£<?php echo $formatSalary .' ' . ucfirst($salaryTyle) ?></strong></p>
			</section>
			<?php echo '<a class="button light centered" target="_blank" href="' . get_field('hr_partner_link') . '">Apply now</a>' ?>
			<?php 	the_content(); ?>
		</article>	
	
	<?php elseif ( is_singular() ) : ?>
	<article>
		<?php
		the_title( '<h1>', '</h1>' ); ?>
		<section class="meta">
			<?php belleviecare_posted_on(); ?>
	 	</section>
		<?php 	the_content();
		?>
		<footer>
			<?php 
				belleviecare_posted_by(); 
				belleviecare_entry_footer(); ?>
		</footer>
	</article>

			
		<?php else : ?>
		<article <?php post_class('thirds border whitebg rounded');  ?> >
			<?php belleviecare_post_thumbnail();
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			belleviecare_posted_on();
			the_content();
		endif; ?>
</article>
