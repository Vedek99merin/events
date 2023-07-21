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


function custom_post_type_event() {
	$labels = array(
		'name'                  => _x( 'Події', 'Назва типу запису', 'text_domain' ),
		'singular_name'         => _x( 'Подія', 'Однина назви типу запису', 'text_domain' ),
		'menu_name'             => __( 'Події', 'text_domain' ),
		'name_admin_bar'        => __( 'Подія', 'text_domain' ),
		'add_new'               => __( 'Додати нову', 'text_domain' ),
		'add_new_item'          => __( 'Додати нову подію', 'text_domain' ),
		'edit_item'             => __( 'Редагувати подію', 'text_domain' ),
		'view_item'             => __( 'Переглянути подію', 'text_domain' ),
		'all_items'             => __( 'Всі події', 'text_domain' ),
		'search_items'          => __( 'Пошук подій', 'text_domain' ),
		'not_found'             => __( 'Подій не знайдено', 'text_domain' ),
		'not_found_in_trash'    => __( 'В корзині подій не знайдено', 'text_domain' ),
		'featured_image'        => _x( 'Зображення для події', 'Зображення запису типу event', 'text_domain' ),
		'set_featured_image'    => _x( 'Вибрати зображення події', 'Зображення запису типу event', 'text_domain' ),
		'remove_featured_image' => _x( 'Видалити зображення події', 'Зображення запису типу event', 'text_domain' ),
		'archives'              => _x( 'Архів подій', 'Архів записів типу event', 'text_domain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'event', $args );
}
add_action( 'init', 'custom_post_type_event' );

// Реєстрація кастомної таксономії "Год" (теги)
function custom_taxonomy_year() {
	$labels = array(
			'name'                       => _x( 'Роки', 'taxonomy general name', 'text_domain' ),
			'singular_name'              => _x( 'Рік', 'taxonomy singular name', 'text_domain' ),
			'search_items'               => __( 'Шукати роки', 'text_domain' ),
			'popular_items'              => __( 'Популярні роки', 'text_domain' ),
			'all_items'                  => __( 'Всі роки', 'text_domain' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Редагувати рік', 'text_domain' ),
			'update_item'                => __( 'Оновити рік', 'text_domain' ),
			'add_new_item'               => __( 'Додати новий рік', 'text_domain' ),
			'new_item_name'              => __( 'Нова назва року', 'text_domain' ),
			'separate_items_with_commas' => __( 'Розділіть роки комами', 'text_domain' ),
			'add_or_remove_items'        => __( 'Додайте або видаліть роки', 'text_domain' ),
			'choose_from_most_used'      => __( 'Оберіть з найпопулярніших', 'text_domain' ),
			'not_found'                  => __( 'Роки не знайдено', 'text_domain' ),
			'menu_name'                  => __( 'Роки', 'text_domain' ),
	);

	$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'year' ),
	);

	register_taxonomy( 'year', 'event', $args );
}
add_action( 'init', 'custom_taxonomy_year', 0 );

// Реєстрація кастомної таксономії "Місяць" (категорія)
function custom_taxonomy_month() {
	$labels = array(
			'name'                       => _x( 'Місяці', 'taxonomy general name', 'text_domain' ),
			'singular_name'              => _x( 'Місяць', 'taxonomy singular name', 'text_domain' ),
			'search_items'               => __( 'Шукати місяці', 'text_domain' ),
			'popular_items'              => __( 'Популярні місяці', 'text_domain' ),
			'all_items'                  => __( 'Всі місяці', 'text_domain' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Редагувати місяць', 'text_domain' ),
			'update_item'                => __( 'Оновити місяць', 'text_domain' ),
			'add_new_item'               => __( 'Додати новий місяць', 'text_domain' ),
			'new_item_name'              => __( 'Нова назва місяця', 'text_domain' ),
			'separate_items_with_commas' => __( 'Розділіть місяці комами', 'text_domain' ),
			'add_or_remove_items'        => __( 'Додайте або видаліть місяці', 'text_domain' ),
			'choose_from_most_used'      => __( 'Оберіть з найпопулярніших', 'text_domain' ),
			'not_found'                  => __( 'Місяці не знайдено', 'text_domain' ),
			'menu_name'                  => __( 'Місяці', 'text_domain' ),
	);

	$args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'month' ),
	);

	register_taxonomy( 'month', 'event', $args );
}
add_action( 'init', 'custom_taxonomy_month', 0 );

// Реєстрація кастомної таксономії "Місце проведення" (категорія)
function custom_taxonomy_location() {
	$labels = array(
			'name'                       => _x( 'Місця проведення', 'taxonomy general name', 'text_domain' ),
			'singular_name'              => _x( 'Місце проведення', 'taxonomy singular name', 'text_domain' ),
			'search_items'               => __( 'Шукати місця проведення', 'text_domain' ),
			'popular_items'              => __( 'Популярні місця проведення', 'text_domain' ),
			'all_items'                  => __( 'Всі місця проведення', 'text_domain' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Редагувати місце проведення', 'text_domain' ),
			'update_item'                => __( 'Оновити місце проведення', 'text_domain' ),
			'add_new_item'               => __( 'Додати нове місце проведення', 'text_domain' ),
			'new_item_name'              => __( 'Нова назва місця проведення', 'text_domain' ),
			'separate_items_with_commas' => __( 'Розділіть місця проведення комами', 'text_domain' ),
			'add_or_remove_items'        => __( 'Додайте або видаліть місця проведення', 'text_domain' ),
			'choose_from_most_used'      => __( 'Оберіть з найпопулярніших', 'text_domain' ),
			'not_found'                  => __( 'Місця проведення не знайдено', 'text_domain' ),
			'menu_name'                  => __( 'Місця проведення', 'text_domain' ),
	);

	$args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'location' ),
	);

	register_taxonomy( 'location', 'event', $args );
}
add_action( 'init', 'custom_taxonomy_location', 0 );