<?php
/**
 * Udoy Portfolio Theme Functions
 *
 * @package Udoy_Portfolio
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Define constants
 */
define( 'UDOY_PORTFOLIO_VERSION', '1.0.0' );
define( 'UDOY_PORTFOLIO_DIR', get_template_directory() );
define( 'UDOY_PORTFOLIO_URI', get_template_directory_uri() );
define( 'UDOY_PORTFOLIO_ASSETS_URI', UDOY_PORTFOLIO_URI . '/assets' );

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function udoy_portfolio_theme_support() {
    // Add theme support features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 50,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'excerpt' );

    // Set featured image sizes
    set_post_thumbnail_size( 1200, 675, true );
    add_image_size( 'udoy-project-full', 600, 400, true );
    add_image_size( 'udoy-blog-thumb', 400, 300, true );

    // Register menus
    register_nav_menus( array(
        'primary'         => esc_html__( 'Primary Menu', 'udoy-portfolio' ),
        'footer'          => esc_html__( 'Footer Menu', 'udoy-portfolio' ),
        'footer_services' => esc_html__( 'Footer Services Menu', 'udoy-portfolio' ),
        'secondary'       => esc_html__( 'Secondary Menu', 'udoy-portfolio' ),
    ) );
}
add_action( 'after_setup_theme', 'udoy_portfolio_theme_support' );

/**
 * Register widget areas
 */
function udoy_portfolio_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'udoy-portfolio' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Footer Widget Area 1', 'udoy-portfolio' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'udoy-portfolio' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Footer Widget Area 2', 'udoy-portfolio' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'udoy-portfolio' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Footer Widget Area 3', 'udoy-portfolio' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'udoy_portfolio_widgets_init' );

/**
 * Enqueue theme scripts and styles
 */
function udoy_portfolio_enqueue_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'udoy-portfolio-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Enqueue main stylesheet
    wp_enqueue_style(
        'udoy-portfolio-style',
        UDOY_PORTFOLIO_ASSETS_URI . '/css/main.css',
        array(),
        UDOY_PORTFOLIO_VERSION,
        'all'
    );

    // Enqueue main JavaScript
    wp_enqueue_script(
        'udoy-portfolio-main',
        UDOY_PORTFOLIO_ASSETS_URI . '/js/main.js',
        array(),
        UDOY_PORTFOLIO_VERSION,
        true
    );

    // Localize script for WordPress functions
    wp_localize_script( 'udoy-portfolio-main', 'udoyPortfolio', array(
        'ajaxurl'    => admin_url( 'admin-ajax.php' ),
        'nonce'      => wp_create_nonce( 'udoy-nonce' ),
        'themeColor' => get_theme_mod( 'udoy_primary_color', '#2563eb' ),
    ) );

    // Comment script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'udoy_portfolio_enqueue_scripts' );

/**
 * Enqueue admin scripts and styles
 */
function udoy_portfolio_admin_enqueue_scripts() {
    wp_enqueue_style(
        'udoy-portfolio-admin',
        UDOY_PORTFOLIO_ASSETS_URI . '/css/admin.css',
        array(),
        UDOY_PORTFOLIO_VERSION
    );
}
add_action( 'admin_enqueue_scripts', 'udoy_portfolio_admin_enqueue_scripts' );

/**
 * Include additional theme functions
 */
require_once UDOY_PORTFOLIO_DIR . '/inc/custom-post-types.php';
require_once UDOY_PORTFOLIO_DIR . '/inc/customizer.php';
require_once UDOY_PORTFOLIO_DIR . '/inc/template-tags.php';

/**
 * Set content width
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/**
 * Custom logo output
 */
function udoy_portfolio_logo() {
    if ( has_custom_logo() ) {
        return the_custom_logo();
    } else {
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-title-link">';
        echo '<span class="site-title">Udoy<span class="text-gray-400">.</span></span>';
        echo '</a>';
    }
}

/**
 * Get primary menu
 */
function udoy_portfolio_primary_menu() {
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'nav-menu',
            'container'      => false,
            'fallback_cb'    => 'wp_page_menu',
            'depth'          => 2,
        ) );
    }
}

/**
 * Excerpt more link
 */
function udoy_portfolio_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'udoy_portfolio_excerpt_more' );

/**
 * Excerpt length
 */
function udoy_portfolio_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'udoy_portfolio_excerpt_length' );

/**
 * Body class
 */
function udoy_portfolio_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'is-front-page';
    }
    if ( is_home() ) {
        $classes[] = 'is-home';
    }
    if ( is_singular( 'post' ) ) {
        $classes[] = 'is-single-post';
    }
    return $classes;
}
add_filter( 'body_class', 'udoy_portfolio_body_classes' );
