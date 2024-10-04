<?php
/**
 * silverless functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package silverless
 */

require_once 'silverless-config.php';
require_once 'functions/declutter.php';
require_once 'functions/users.php';

include_once 'acf-utility.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function silverless_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on silverless, use a find and replace
	 * to change 'silverless' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('silverless', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	add_theme_support('woocommerce');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'main-menu' => esc_html__('Primary', 'silverless'),
			'sub-menu' => esc_html__('Secondary', 'silverless'),
			'footer-menu' => esc_html__('Footer', 'silverless'),
			'pre-menu' => esc_html__('Pre Prep', 'silverless'),
			'prep-menu' => esc_html__('Prep', 'silverless'),
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
			'silverless_custom_background_args',
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

	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}
add_action('after_setup_theme', 'silverless_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function silverless_content_width()
{
	$GLOBALS['content_width'] = apply_filters('silverless_content_width', 640);
}
add_action('after_setup_theme', 'silverless_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function silverless_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'silverless'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'silverless'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'silverless_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function silverless_scripts()
{
	global $silverless_config;
	wp_enqueue_style('silverless-style', get_template_directory_uri() . '/inc/assets/css/main.css', [], $silverless_config['version']);
	wp_style_add_data('silverless-style', 'rtl', 'replace');

	wp_enqueue_style('silverless-vendor-style', get_template_directory_uri() . '/inc/assets/css/vendor.css', [], $silverless_config['version']);

	wp_enqueue_script('silverless-scripts', get_template_directory_uri() . '/inc/assets/js/core.js', ['jquery'], $silverless_config['version'], true);

	wp_register_script('fontawesome', 'https://kit.fontawesome.com/dc2cdfd0db.js', [], null, true);
	wp_enqueue_script('fontawesome');
}
add_action('wp_enqueue_scripts', 'silverless_scripts');

function silverless_acf_google_map_api($api)
{
	$api['key'] = 'AIzaSyClrCRpYppmoqOu5RPPM-Aj71LsNq6lMHY';
	return $api;
}
add_filter('acf/fields/google_map/api', 'silverless_acf_google_map_api');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(
		array(
			'page_title' => 'Admin Settings',
			'menu_title' => 'Admin Settings',
			'menu_slug' => 'site-general-settings',
			'capability' => 'edit_posts',
			'redirect' => false
		)
	);

	acf_add_options_page(
		array(
			'page_title' => 'Default Content',
			'menu_title' => 'Default Content',
			'menu_slug' => 'site-default-content',
			'capability' => 'edit_posts',
			'redirect' => false
		)
	);
}

function silverless_dashboard_widget()
{
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Technical Support', 'silverless_dashboard_help');
}

function silverless_dashboard_help()
{
	echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

/* Dashboard Config */
add_action('wp_dashboard_setup', 'silverless_dashboard_widget');

/* Dashboard Style */
// add_action('admin_head', 'silverless_custom_fonts');

// function silverless_custom_fonts()
// {
// 	echo '<style type="text/css">' . file_get_contents(__DIR__ . "/inc/assets/css/admin.css") . '</style>';
// }

// Function to change "posts" to "news" in the admin side menu
function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'News Articles';
	$submenu['edit.php'][5][0] = 'News Articles';
	$submenu['edit.php'][10][0] = 'Add News Article';
	$submenu['edit.php'][16][0] = 'Tags';
	echo '';
}
add_action('admin_menu', 'change_post_menu_label');
// Function to change post object labels to "news"
function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News Articles';
	$labels->singular_name = 'News Article';
	$labels->add_new = 'Add News Article';
	$labels->add_new_item = 'Add News Article';
	$labels->edit_item = 'Edit News Article';
	$labels->new_item = 'News Article';
	$labels->view_item = 'View News Article';
	$labels->search_items = 'Search News Articles';
	$labels->not_found = 'No News Articles found';
	$labels->not_found_in_trash = 'No News Articles found in Trash';
}
add_action('init', 'change_post_object_label');


add_filter('acfe/flexible/thumbnail', 'custom_acfe_flex_content_preview', 10, 3);
function custom_acfe_flex_content_preview($thumbnail, $field, $layout)
{
	return get_template_directory_uri() . '/inc/img/flex-content/' . str_replace(['_', ' '], '-', $layout['name']) . '.png';
}

function silverless_admin_scripts()
{
	global $silverless_config;
	wp_enqueue_script('silverless-scripts', get_template_directory_uri() . '/inc/assets/js/admin.js', ['jquery'], $silverless_config['version'], true);
}
add_action('admin_enqueue_scripts', 'silverless_admin_scripts');

function get_container_classes(array $classes = [])
{
	$default = [
		'container'
	];

	$classes = array_merge($default, $classes);

	if ($background = get_sub_field('background')) {
		$classes[] = $background;
	}

	return implode(' ', $classes);
}

function get_row_classes(array $classes = [])
{
	$default = [
		'row'
	];

	$classes = array_merge($default, $classes);

	if ($width = get_sub_field('container_width')) {
		$classes[] = $width;
	}

	if ($offset = get_sub_field('container_offset')) {
		$classes[] = $offset;
	}

	if (get_sub_field('full_width_on_mobile')) {
		$classes[] = 'col-xs-12';
	}

	return implode(' ', $classes);
}

function get_container_styles(array $styles = [])
{
	if ($margin_t = get_sub_field('margin_t')) {
		$styles[] = "--margin_t: {$margin_t}rem;";
	}
	if ($margin_r = get_sub_field('margin_r')) {
		$styles[] = "--margin_r: {$margin_r}rem;";
	}
	if ($margin_b = get_sub_field('margin_b')) {
		$styles[] = "--margin_b: {$margin_b}rem;";
	}
	if ($margin_l = get_sub_field('margin_l')) {
		$styles[] = "--margin_l: {$margin_l}rem;";
	}

	if ($padding_t = get_sub_field('padding_t')) {
		$styles[] = "--padding_t: {$padding_t}rem;";
	}
	if ($padding_r = get_sub_field('padding_r')) {
		$styles[] = "--padding_r: {$padding_r}rem;";
	}
	if ($padding_b = get_sub_field('padding_b')) {
		$styles[] = "--padding_b: {$padding_b}rem;";
	}
	if ($padding_l = get_sub_field('padding_l')) {
		$styles[] = "--padding_l: {$padding_l}rem;";
	}

	return implode(' ', $styles);
}

/**
 * Remove product page tabs
 */
add_filter( 'woocommerce_product_tabs', 'my_remove_all_product_tabs', 98 );

function my_remove_all_product_tabs( $tabs ) {
  unset( $tabs['description'] );      	// Remove the description tab
  unset( $tabs['reviews'] ); 			// Remove the reviews tab
  unset( $tabs['additional_information'] );  	// Remove the additional information tab
  return $tabs;
}


//Remove for original position
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

//Move under cart button (option 1)
add_action ( 'woocommerce_single_product_summary', 'woocommerce_output_all_notices', 35 ); 
