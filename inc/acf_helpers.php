<?php
// IF ACF not active
if ( ! class_exists( 'ACF' ) ) {
	return false;
}

//ADD ACF Option Page
if ( function_exists('acf_add_options_page') ) {
	$site_icon = get_site_icon_url( 20 );

	$options_page_args = array(
		'page_title' => __( 'Theme General Settings', THEME_DOMAIN ),
		'menu_title' => __( 'Theme Settings', THEME_DOMAIN ),
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
		'position'   => 2
	);

	if ( $site_icon ) {
		$options_page_args['icon_url'] = $site_icon;
	}

	acf_add_options_page( $options_page_args );
}

//ADD ACF Local JSON (SYNC fields
if ( ! function_exists( 'theme_acf_json_save' ) ) {
	function theme_acf_json_save( $path ) {
		return get_template_directory() . '/acf-json';
	}
	add_filter( 'acf/settings/save_json', 'theme_acf_json_save' );
}

//Dynamic replacement of text to current year in copyright
if ( ! function_exists( 'acf_replace_copyright_year_value' ) ) {
	function acf_replace_copyright_year_value( $value ) {
		if ( ! is_admin() ) {
			$value = str_replace( '%copyright_year%', date( 'Y' ), $value );
		}

		return $value;
	}
	add_filter( 'acf/load_value/name=footer_copyright', 'acf_replace_copyright_year_value' );
}