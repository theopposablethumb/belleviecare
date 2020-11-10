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
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','GTM-MGFH38F');
		</script>
	<!-- End Google Tag Manager -->
	
	<?php wp_head(); ?>
	
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
 		fbq('init', '772022193176062'); 
		fbq('track', 'PageView');
	</script>
	<noscript>
 		<img height="1" width="1" src="https://www.facebook.com/tr?id=772022193176062&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
				<a class="button dark call" href="/contact-us">Call Us</a>
				<?php $postName = $post->post_name; //Get the slug of the current page
						if (strpos($postName, 'durham') !== false) {
							echo '<a class="button dark mobile" href="tel: 01987654321">Call Us</a>';
						} else {
							echo '<a class="button dark mobile" href="tel: 01235355570">Call Us</a>';
						} 
					?>
			</div>
			<a class="button openNav">Menu</a>
			
		</div>
		</div>
	</header>
