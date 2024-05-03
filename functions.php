<?php
/**
 * ncsystems functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ncsystems
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ncsystems_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ncsystems, use a find and replace
	 * to change 'ncsystems' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('ncsystems', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'ncsystems'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ncsystems_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'ncsystems_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ncsystems_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ncsystems_content_width', 640);
}
add_action('after_setup_theme', 'ncsystems_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ncsystems_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'ncsystems'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'ncsystems'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'ncsystems_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ncsystems_scripts()
{
	wp_enqueue_style('ncsystems-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('ncsystems-style', 'rtl', 'replace');

	wp_enqueue_script('ncsystems-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ncsystems_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('wp_enqueue_scripts', 'addStyles');
function addStyles()
{
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css');
	wp_enqueue_style('main-menu', get_template_directory_uri() . '/css/main-menu.css');
	wp_enqueue_style('site-main', get_template_directory_uri() . '/css/site-main.css');
	wp_enqueue_style('main-page-menues', get_template_directory_uri() . '/css/main-page-menues.css');
	wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css');
	wp_enqueue_style('page-bibliography', get_template_directory_uri() . '/css/bibliography-page.css');
	wp_enqueue_style('page-statistic', get_template_directory_uri() . '/css/statistic-page.css');
}

add_action('wp_footer', 'addScripts');
function addScripts()
{
	wp_enqueue_script('main-menu', get_template_directory_uri() . '/js/main-menu.js');
	wp_enqueue_script('footer', get_template_directory_uri() . '/js/footer.js');
	if (is_front_page()) {
		wp_enqueue_script('section-1', get_template_directory_uri() . '/js/section-1.js');
		wp_enqueue_script('menues-changer', get_template_directory_uri() . '/js/menues-changer.js');
		wp_enqueue_script('section-2', get_template_directory_uri() . '/js/section-2.js');
	}

	if (is_page('Библиография')) {
		wp_enqueue_script('artiсles-functions', get_template_directory_uri() . '/js/bibliography/functions.js');
		wp_enqueue_script('bibliography', get_template_directory_uri() . '/js/bibliography/bibliography.js');
	}

	if (is_page('Библиографическая статистика')) {
		wp_enqueue_script('artiсles-functions', get_template_directory_uri() . '/js/bibliography/functions.js');
		wp_enqueue_script('statistic-functions', get_template_directory_uri() . '/js/statistics/functions.js');
		wp_enqueue_script('statistics', get_template_directory_uri() . '/js/statistics/statistics.js');
	}
	
	$custom_query = new WP_Query(array(
		'post_type' => 'staff',
		'posts_per_page' => -1, // Получить все записи
	));
	
	$data_to_pass = array();
	if ($custom_query->have_posts()) {
		while ($custom_query->have_posts()) {
			$custom_query->the_post();
	
			// Получаем кастомные поля
			$inicials = get_post_meta(get_the_ID(), 'initials', true);
			$id = get_post_meta(get_the_ID(), 'id', true);
			$publications = get_post_meta(get_the_ID(), 'publications', true);
			$avatarUrl = get_post_meta(get_the_ID(), 'avatarUrl', true);
			$allCitied = get_post_meta(get_the_ID(), 'allCitied', true);
			$mostPopular = get_post_meta(get_the_ID(), 'mostSitied', true);

			$data_to_pass[] = array(
				'name' => get_the_title(),
				'inicials' => $inicials,
				'id' => $id,
				'publicainsions' => $publications,
				'avatarUrl' => $avatarUrl,
				'allCitied' => $allCitied,
				'mostCitied' => $mostPopular,
				// Добавьте другие элементы записи, которые вам нужны
			);
		}
	}
	
	// Сброс данных поста
	wp_reset_postdata();
	wp_localize_script('statistics', 'authorsArray', $data_to_pass);
}

add_action('after_setup_theme', 'topMenu');
function topMenu()
{
	register_nav_menu('topMenu', 'Верхнее меню');
}

add_action('after_setup_theme', 'mainMenu');
function mainMenu()
{
	register_nav_menu('mainMenu', 'Главное меню');
}

add_action('after_setup_theme', 'teachingMenu');
function teachingMenu()
{
	register_nav_menu('teachingMenu', 'Обучение меню');
}

add_action('after_setup_theme', 'bibliographyMenu');
function bibliographyMenu()
{
	register_nav_menu('bibliographyMenu', 'Библиография меню');
}

remove_filter("the_excerpt", "wpautop");


add_action('init', 'register_post_types');

function register_post_types()
{

	register_post_type('article', [
		'label' => null,
		'labels' => [
			'name' => 'Научные публикации', // основное название для типа записи
			'singular_name' => 'Научная публикация', // название для одной записи этого типа
			'add_new' => 'Добавить публикацию', // для добавления новой записи
			'add_new_item' => 'Добавление публикации', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item' => 'Редактирование публикации', // для редактирования типа записи
			'new_item' => 'Новая публикация', // текст новой записи
			'view_item' => 'Смотреть публикацию', // для просмотра записи этого типа.
			'search_items' => 'Искать публикацию', // для поиска по этим типам записи
			'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon' => '', // для родителей (у древовидных типов)
			'menu_name' => 'Научные публикации', // название меню
		],
		'description' => '',
		'public' => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu' => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest' => null, // добавить в REST API. C WP 4.7
		'rest_base' => null, // $post_type. C WP 4.7
		'menu_position' => 5,
		'menu_icon' => 'dashicons-analytics',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical' => false,
		'supports' => ['title', 'editor',], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies' => [],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
	]);


	register_post_type('staff', [
		'label' => null,
		'labels' => [
			'name' => 'Сотрудники', // основное название для типа записи
			'singular_name' => 'Сотрудник', // название для одной записи этого типа
			'add_new' => 'Добавить сотрудника', // для добавления новой записи
			'add_new_item' => 'Добавление сотрудника', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item' => 'Редактирование информации', // для редактирования типа записи
			'new_item' => 'Новый сотрудник', // текст новой записи
			'view_item' => 'Смотреть информацию', // для просмотра записи этого типа.
			'search_items' => 'Искать сотрудника', // для поиска по этим типам записи
			'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon' => '', // для родителей (у древовидных типов)
			'menu_name' => 'Сотрудники', // название меню
		],
		'description' => '',
		'public' => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu' => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest' => null, // добавить в REST API. C WP 4.7
		'rest_base' => null, // $post_type. C WP 4.7
		'menu_position' => 4,
		'menu_icon' => 'dashicons-businessman',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical' => false,
		'supports' => ['title', 'editor',], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies' => [],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
	]);
}




