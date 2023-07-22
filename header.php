<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<?php if (function_exists('the_custom_logo')) {
			the_custom_logo();
		} ?>
		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
				'menu_id' => '3',
				'menu' => 'main',
				'menu_class' => 'header-menu',
				'container' => false,
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
