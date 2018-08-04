<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<header>

			<div class="container">
				<div class="header-top">
					<div class="header-top__contact">
						<p>NEED HELP?</p>
						<p>CALL <a href="tel:0417 520 040">0417 520 040</a></p>
					</div>
					<div class="header-top__user-info d-none d-md-block">
						<a class="header-top__log-in" href="#">Log In</a>
						<button class="header-top__cart"><i class="fa fa-shopping-cart"></i></button>
					</div>
				</div>
				<div class="header-logo">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png' ?>" alt="Fleurieu Hampers logo">		
				</div>
				<div class="header-top__user-info d-md-none">
					<button class="header-top__cart"><i class="fa fa-shopping-cart"></i></button>
					<button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
				</div>
			</div>

			<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<nav class="navbar navbar-expand-md">

			<?php if ( 'container' == $container ) : ?>
				<div class="container" >
			<?php endif; ?>

					

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu'         => 'main',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->
		</header>
	</div><!-- #wrapper-navbar end -->
