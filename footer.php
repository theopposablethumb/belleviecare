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
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
