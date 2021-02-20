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
		<div class="content flex">
			<?php dynamic_sidebar( 'footer'); ?>
			<?php wp_nav_menu( array(  'container' =>false, 'theme_location' => 'footer', ) ); ?>
			<div class="logo flex">
				<a href="https://www.cqc.org.uk/provider/1-8417079420" target="_blank">
					<img src=<?php echo get_template_directory_uri() . '/images/cqclogo.png'; ?> alt="Care Quality Commission logo - BelleVie is regulated by the CQC" title="Regulated by the CQC" />
				</a>
				<img src=<?php echo get_template_directory_uri() . '/images/living-wage-employer.svg'; ?> alt="Living Wage Employer logo - BelleVie is a Living Wage Employer" title="Living Wage Employer" />
				
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
