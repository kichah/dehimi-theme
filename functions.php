<?php
/**
 * Dehimi Organic Theme Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dehimi_Organic
 * @since 1.0.0
 */

// Exit if accessed directly.
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * This function is hooked into the `after_setup_theme` action, which runs
 * before the `init` hook. The `init` hook is too late for some features,
 * such as indicating support for post thumbnails.
 */
function dehimi_organic_setup()
{

    // 1. Theme Support: Add various WordPress features to your theme.

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Switch default core markup for search form, comment form, and comments
    // to output valid HTML5. This is good practice for modern themes.
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',  // Enables themes to declare support for the new style attribute
            'script', // Enables themes to declare support for the new script attribute
        ]
    );

    // Add theme support for Custom Logo.
    add_theme_support('custom-logo', [
        'height'      => 100, // Max height for your logo
        'width'       => 400, // Max width for your logo
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Add theme support for selective refresh for widgets (improves Customizer experience).
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles for Gutenberg.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images in Gutenberg.
    add_theme_support('align-wide');

    // Add support for responsive embedded content (e.g., YouTube videos).
    add_theme_support('responsive-embeds');

    // Add support for custom color palette (Gutenberg).
    add_theme_support(
        'editor-color-palette',
        [
            [
                'name'  => esc_html__('Primary Green', 'dehimi-theme'),
                'slug'  => 'primary-green',
                'color' => '#8CC63F', // Example color: Your brand green
            ],
            [
                'name'  => esc_html__('Accent Orange', 'dehimi-theme'),
                'slug'  => 'accent-orange',
                'color' => '#F4A261', // Example color: Your brand orange
            ],
            // Add more colors as needed for your theme's palette
        ]
    );

    // Add support for custom font sizes (Gutenberg).
    add_theme_support(
        'editor-font-sizes',
        [
            [
                'name' => esc_html__('Small', 'dehimi-theme'),
                'size' => 14,
                'slug' => 'small',
            ],
            [
                'name' => esc_html__('Normal', 'dehimi-theme'),
                'size' => 16,
                'slug' => 'normal',
            ],
            [
                'name' => esc_html__('Large', 'dehimi-theme'),
                'size' => 24,
                'slug' => 'large',
            ],
            // Add more font sizes as needed
        ]
    );

    // 2. Navigation Menus: Register theme navigation menus.
    register_nav_menus([
        'primary-menu' => esc_html__('Primary Menu', 'dehimi-theme'),
        'footer-menu'  => esc_html__('Footer Menu', 'dehimi-theme'),
        // Add more menus if your theme has multiple navigation areas
    ]);

    // 3. Text Domain: Load the theme's text domain for translation.
    // This allows your theme to be translated into different languages.
    load_theme_textdomain('dehimi-theme', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'dehimi_organic_setup');

/**
 * Enqueue scripts and styles for the theme.
 * This is where you link your bundled JavaScript and compiled CSS.
 */
function dehimi_organic_assets()
{
    // Enqueue your compiled main CSS file (from your separate SASS compilation)
    wp_enqueue_style(
        'dehimi-theme-main-css',                                   // Unique handle (ID) for your stylesheet
        get_template_directory_uri() . '/dist/css/main.css',       // Full URL to your compiled CSS file
        [],                                                   // Dependencies: an array of other registered stylesheet handles that this stylesheet depends on.
                                                                   // For example, if your CSS relies on 'dashicons', you'd put array('dashicons'). Empty array if none.
        filemtime(get_template_directory() . '/dist/css/main.css') // Version number for cache busting.
                                                                   // 'filemtime' uses the file's last modification time,
                                                                   // which automatically updates the version when you recompile.
    );

    // Enqueue your compiled main JavaScript file (from Vite)
    wp_enqueue_script(
        'dehimi-theme-main-js',                                     // Unique handle (ID) for your script
        get_template_directory_uri() . '/dist/js/bundle.js',        // Full URL to your compiled JS file
        [],                                                    // Dependencies: an array of registered script handles this script depends on.
                                                                    // For modern JS, you usually don't need 'jquery' unless you explicitly use it.
        filemtime(get_template_directory() . '/dist/js/bundle.js'), // Version for cache busting.
        true                                                        // In footer: `true` loads the script in the footer, which is best for performance.
                                                                    // `false` (default) loads it in the <head>.
    );

    // Optional: Pass data from PHP to your JavaScript.
    // This is very useful if your JavaScript needs dynamic values from WordPress.
    /*
    wp_localize_script(
        'dehimi-theme-main-js', // The handle of the script to attach data to
        'dehimiThemeData',      // The name of the JavaScript object that will contain the data (e.g., dehimiThemeData.ajax_url)
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ), // Example: WordPress AJAX URL
            'nonce'    => wp_create_nonce( 'my_custom_nonce' ), // Example: Security nonce for AJAX requests
            'theme_uri' => get_template_directory_uri(), // Example: Theme base URL
        )
    );
    */
}
add_action('wp_enqueue_scripts', 'dehimi_organic_assets');

/**
 * Register widget areas.
 * This is where you define sidebars and other widgetized areas for your theme.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dehimi_organic_widgets_init()
{
    register_sidebar([
        'name'          => esc_html__('Main Sidebar', 'dehimi-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your primary sidebar.', 'dehimi-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">', // HTML to output before each widget
        'after_widget'  => '</section>',                              // HTML to output after each widget
        'before_title'  => '<h2 class="widget-title">',               // HTML to output before each widget title
        'after_title'   => '</h2>',                                   // HTML to output after each widget title
    ]);

    // Example: Register a footer widget area
    register_sidebar([
        'name'          => esc_html__('Footer Column 1', 'dehimi-theme'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets to the first footer column.', 'dehimi-theme'),
        'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ]);
    // Add more register_sidebar() calls for other widget areas (e.g., different footer columns, header)
}
add_action('widgets_init', 'dehimi_organic_widgets_init');

// Optional: Theme-specific helper functions, shortcodes, or filters.
// As your theme grows, you might want to organize these into separate files
// and include them here using `require_once`.
/*
// Example: Custom function to display copyright year
function dehimi_organic_copyright_year() {
    return date_i18n( 'Y' );
}

// Example: Removing unnecessary WordPress head items for a cleaner output
function dehimi_organic_cleanup_head() {
    remove_action( 'wp_head', 'rsd_link' ); // Really Simple Discovery link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer manifest file
    remove_action( 'wp_head', 'wp_generator' ); // WordPress version
    remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // Shortlink
    remove_action( 'wp_head', 'wp_resource_hints', 2 ); // DNS prefetch, etc.
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Emoji detection script
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'dehimi_organic_cleanup_head' );
*/

// You can include other PHP files to keep functions.php organized.
// For example, if you have custom template tags in 'inc/template-tags.php':
// require_once get_template_directory() . '/inc/template-tags.php';
