<?php
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'starter_scripts' ) ) {
	function starter_scripts() {
		wp_enqueue_style( 'starter-style', get_stylesheet_uri(), array(), THEME_VERSION );

		//Styles
		wp_enqueue_style( 'starter-style-main',  get_template_directory_uri() . '/dist/styles/main.css', array(), THEME_VERSION );

		//Scripts
		//Add Localize
		wp_enqueue_script( 'starter-script-main', get_template_directory_uri() . '/dist/js/main.js' , array(), false, true );
		wp_localize_script('starter-script-main', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

		//Add global var
		/* if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		} */
	}
	add_action( 'wp_enqueue_scripts', 'starter_scripts' );
}

