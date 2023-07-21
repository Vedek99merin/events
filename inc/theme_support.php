<?php
if ( ! function_exists( 'theme_setup' ) ) {
	function theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		/**
		 * Add support for custom logo.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		register_nav_menus(
			array(
				'header_menu' => esc_html__( 'Header Menu', THEME_DOMAIN ),
				'footer_menu' => esc_html__( 'Footer Menu', THEME_DOMAIN )
			)
		);

		/**
		 * Add Image sizes
		 */

		add_image_size( 'theme_admin_icon_size', 20, 0, array( 'center', 'center' ) );
	}
	add_action( 'after_setup_theme', 'theme_setup' );
}