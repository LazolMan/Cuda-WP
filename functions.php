<?php

/**
 * cuda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cuda
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('cuda_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cuda_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cuda, use a find and replace
		 * to change 'cuda' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('cuda', get_template_directory() . '/languages');

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
				'menu-1' 	=> esc_html__('Primary', 'cuda'),
				'footer'	=> esc_html__('Footer', 'cuda'),
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
				'cuda_custom_background_args',
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
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'cuda_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cuda_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('cuda_content_width', 640);
}
add_action('after_setup_theme', 'cuda_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cuda_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'cuda'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'cuda'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'cuda_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cuda_scripts()
{
	wp_enqueue_style('cuda-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('cuda-style', 'rtl', 'replace');

	wp_enqueue_style('instensive-main', get_template_directory_uri() . '/layouts/style.css');

	//wp_enqueue_script( 'cuda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script('cuda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'cuda_scripts');

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
 * Redux Options Panel.
 */
require get_template_directory() . '/inc/sample-config.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function home($meta_boxes)
{
	$prefix = 'cuda-';

	$meta_boxes[] = array(
		'id' => 'home',
		'title' => esc_html__('Home Page', 'metabox-online-generator'),
		'post_types' => array('page'),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'work_button',
				'type' => 'text',
				'name' => esc_html__('Work Button', 'metabox-online-generator'),
			),
			array(
				'id' => $prefix . 'services_title',
				'type' => 'text',
				'name' => esc_html__('Services Title', 'metabox-online-generator'),
			),
			array(
				'id' => $prefix . 'services_desc',
				'type' => 'textarea',
				'name' => esc_html__('Services Description', 'metabox-online-generator'),
			),
			array(
				'id' => $prefix . 'items_title',
				'type' => 'text',
				'name' => esc_html__('Items Title', 'metabox-online-generator'),
				'clone' => 'true',
			),
			array(
				'id' => $prefix . 'items_image',
				'type' => 'image_advanced',
				'name' => esc_html__('Items Image', 'metabox-online-generator'),
			),
			array(
				'id' => $prefix . 'items_desc',
				'type' => 'textarea',
				'name' => esc_html__('Items Description', 'metabox-online-generator'),
				'clone' => 'true',
			),
			array(
				'id' => $prefix . 'contact_title',
				'type' => 'text',
				'name' => esc_html__('Contact Title', 'metabox-online-generator'),
			),
			array(
				'id' => $prefix . 'contact_desc',
				'type' => 'textarea',
				'name' => esc_html__('Contact Description', 'metabox-online-generator'),
			),
			array(
				'id' => $prefix . 'contact_form',
				'type' => 'text',
				'name' => esc_html__('Contact Form Shortcode', 'metabox-online-generator'),
			),
		),
	);

	return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'home');
