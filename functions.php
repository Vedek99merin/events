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
		'name'                  => 'Події',
		'singular_name'         => 'Подія',
		'menu_name'             => 'Події',
		'name_admin_bar'        => 'Подія',
		'add_new'               => 'Додати нову',
		'add_new_item'          => 'Додати нову подію',
		'edit_item'             => 'Редагувати подію',
		'view_item'             => 'Переглянути подію',
		'all_items'             => 'Всі події',
		'search_items'          => 'Пошук подій',
		'not_found'             => 'Подій не знайдено',
		'not_found_in_trash'    => 'В корзині подій не знайдено',
		'featured_image'        => 'Зображення для події',
		'set_featured_image'    => 'Вибрати зображення події',
		'remove_featured_image' => 'Видалити зображення події',
		'archives'              => 'Архів подій',
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

function custom_taxonomy_year() {
	$labels = array(
		'name'                       => 'Роки',
		'singular_name'              => 'Рік',
		'search_items'               => 'Шукати роки',
		'popular_items'              => 'Популярні роки',
		'all_items'                  => 'Всі роки',
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => 'Редагувати рік',
		'update_item'                => 'Оновити рік',
		'add_new_item'               => 'Додати новий рік',
		'new_item_name'              => 'Нова назва року',
		'separate_items_with_commas' => 'Розділіть роки комами',
		'add_or_remove_items'        => 'Додайте або видаліть роки',
		'choose_from_most_used'      => 'Оберіть з найпопулярніших',
		'not_found'                  => 'Роки не знайдено',
		'menu_name'                  => 'Роки',
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

function custom_taxonomy_month() {
	$labels = array(
		'name'                       => 'Місяці',
		'singular_name'              => 'Місяць',
		'search_items'               => 'Шукати місяці',
		'popular_items'              => 'Популярні місяці',
		'all_items'                  => 'Всі місяці',
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => 'Редагувати місяць',
		'update_item'                => 'Оновити місяць',
		'add_new_item'               => 'Додати новий місяць',
		'new_item_name'              => 'Нова назва місяця',
		'separate_items_with_commas' => 'Розділіть місяці комами',
		'add_or_remove_items'        => 'Додайте або видаліть місяці',
		'choose_from_most_used'      => 'Оберіть з найпопулярніших',
		'not_found'                  => 'Місяці не знайдено',
		'menu_name'                  => 'Місяці',
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

function custom_taxonomy_location() {
	$labels = array(
		'name'                       => 'Місця проведення',
		'singular_name'              => 'Місце проведення',
		'search_items'               => 'Шукати місця проведення',
		'popular_items'              => 'Популярні місця проведення',
		'all_items'                  => 'Всі місця проведення',
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => 'Редагувати місце проведення',
		'update_item'                => 'Оновити місце проведення',
		'add_new_item'               => 'Додати нове місце проведення',
		'new_item_name'              => 'Нова назва місця проведення',
		'separate_items_with_commas' => 'Розділіть місця проведення комами',
		'add_or_remove_items'        => 'Додайте або видаліть місця проведення',
		'choose_from_most_used'      => 'Оберіть з найпопулярніших',
		'not_found'                  => 'Місця проведення не знайдено',
		'menu_name'                  => 'Місця проведення',
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

function get_taxonomy_terms($taxonomy) {
	$terms = get_terms(array(
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
	));

	return $terms;
}

function ajax_filter_posts() {
	$year = isset($_POST['year']) ? $_POST['year'] : '';
	$month = isset($_POST['month']) ? $_POST['month'] : '';
	$location = isset($_POST['location']) ? $_POST['location'] : '';

	$tax_query = array(
		'relation' => 'AND',
);

if (!empty($year)) {
		$tax_query[] = array(
				'taxonomy' => 'year',
				'field' => 'slug',
				'terms' => $year,
		);
}

if (!empty($month)) {
		$tax_query[] = array(
				'taxonomy' => 'month',
				'field' => 'slug',
				'terms' => $month,
		);
}

if (!empty($location)) {
		$tax_query[] = array(
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $location,
		);
}

$args = array(
		'post_type' => 'event',
		'posts_per_page' => -1,
		'tax_query' => $tax_query,
);

	$query = new WP_Query($args);

		$result = array();
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
			$html =
            '<div class="events-item">
                <a href="' . get_the_permalink() . '">
                    <div class="events-item-image">' . get_the_post_thumbnail() . '</div>
                </a>
                <h2 class="events-item-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>
                <div class="events-item-text">' . get_the_content() . '</div>
            </div>';
				$result[] = $html;
				endwhile;
			endif;
			wp_reset_postdata();
			wp_send_json($result);
			wp_die();
}
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_posts');
add_action('wp_ajax_filter_posts', 'ajax_filter_posts');