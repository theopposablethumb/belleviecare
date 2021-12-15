<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bellevie_Care
 */

?>

	<footer>
		<?php 
			$postName = $post->post_name; //Get the slug of the current page
			$currentPage = substr($postName, 0, strrpos($postName, '-')); //remove everything after the last hyphen so we can use the slug of the current page as a category name
		?>
		<div class="content flex">
			<?php dynamic_sidebar( 'footer'); ?>
			<?php wp_nav_menu( array(  'container' =>false, 'theme_location' => 'footer', ) ); ?>
			<div class="logo flex">
				<?php if (strpos($currentPage, 'oxford') !== false) {
    				echo '<a href="https://www.cqc.org.uk/provider/1-8417079420" target="_blank"><img src=' . get_template_directory_uri() . '/images/cqc-rated-good.png alt="Rated Good by the Care Quality Commission - BelleVie is regulated by the CQC" title="Rated Good by the CQC" /></a>';
    				echo '<img src=' . get_template_directory_uri() . '/images/living-wage-employer.svg alt="Living Wage Employer logo - BelleVie is a Living Wage Employer" title="Living Wage Employer" />';
				}  else {
					echo '<a href="https://www.cqc.org.uk/provider/1-8417079420" target="_blank"><img src=' . get_template_directory_uri() . '/images/cqclogo.png alt="Care Quality Commission logo - BelleVie is regulated by the CQC" title="Regulated by the CQC" /></a>';
					echo '<img src=' . get_template_directory_uri() . '/images/living-wage-employer.svg alt="Living Wage Employer logo - BelleVie is a Living Wage Employer" title="Living Wage Employer" />';
				}?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
