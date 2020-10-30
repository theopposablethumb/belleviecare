<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bellevie_Care
 */

if ( ! is_active_sidebar(  ) ) {
	return;
}
?>

	<?php dynamic_sidebar( ); ?>