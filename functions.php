<?php
require_once 'inc/global_vars.php';
require_once 'inc/theme_support.php';
require_once 'inc/enqueue_scripts.php';
require_once 'inc/acf_helpers.php';

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
