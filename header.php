<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bellevie_Care
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="preconnect" href="https://www.google.com" crossorigin>
	<link rel="preconnect" href="https://api.homecare.co.uk" crossorigin>
	<link rel="preconnect" href="https://googleads.g.doubleclick.net" crossorigin>
	<link rel="preconnect" href="https://www.googleadservices.com" crossorigin>
	<link rel="preconnect" href="https://www.google.co.uk" crossorigin>
	<link rel="preconnect" href="https://www.facebook.com" crossorigin>
	<link rel="preconnect" href="https://www.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://connect.facebook.net" crossorigin>
	<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134709026-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
 		gtag('js', new Date());

  		gtag('config', 'UA-134709026-1');
	</script>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGFH38F"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>

	<header>
		<div>
		<div class="content">
			<?php the_custom_logo(); ?>
			<nav>
					<?php wp_nav_menu( array(  'container' =>false, 'theme_location' => 'primary', ) ); ?>
			</nav>
			<div class="buttons">
				<a class="button dark call" href="tel: 01235 355 570">01235 355 570</a>
				<a class="button dark mobile" href="tel: 01235 355 570">01235 355 570</a>
			</div>
			<a class="button openNav">Menu</a>
			
		</div>
		</div>
	</header>
