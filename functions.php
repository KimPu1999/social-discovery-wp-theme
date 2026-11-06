<?php
/** Social Discovery theme setup. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'SD_VERSION', '1.0.0' );

function sd_setup() {
	load_theme_textdomain( 'social-discovery', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	register_nav_menus( array( 'primary' => __( 'Primary Menu', 'social-discovery' ), 'footer' => __( 'Footer Menu', 'social-discovery' ) ) );
	add_image_size( 'sd-card', 640, 420, true );
	if ( function_exists( 'bp_is_active' ) ) { add_theme_support( 'buddypress' ); }
}
add_action( 'after_setup_theme', 'sd_setup' );

function sd_assets() {
	wp_enqueue_style( 'sd-style', get_stylesheet_uri(), array(), SD_VERSION );
	wp_enqueue_script( 'sd-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), SD_VERSION, true );
	wp_localize_script( 'sd-theme', 'sdTheme', array( 'nonce' => wp_create_nonce( 'sd_theme' ), 'darkMode' => get_theme_mod( 'sd_dark_mode', 'system' ) ) );
}
add_action( 'wp_enqueue_scripts', 'sd_assets' );

function sd_is_buddypress() { return function_exists( 'buddypress' ) || function_exists( 'bp_is_active' ); }
function sd_bp_active( $component ) { return function_exists( 'bp_is_active' ) && bp_is_active( $component ); }
function sd_get_option( $key, $default = '' ) { return get_theme_mod( $key, $default ); }
function sd_home_url( $path = '' ) { return esc_url( home_url( '/' . ltrim( $path, '/' ) ) ); }
function sd_avatar( $user_id = 0, $size = 64 ) { if ( function_exists( 'bp_core_fetch_avatar' ) ) { return bp_core_fetch_avatar( array( 'item_id' => $user_id, 'type' => 'thumb', 'width' => $size, 'height' => $size, 'html' => false ) ); } return get_avatar_url( $user_id ?: get_current_user_id(), array( 'size' => $size ) ); }

function sd_widgets() { register_sidebar( array( 'name' => __( 'Footer Column', 'social-discovery' ), 'id' => 'footer-1', 'description' => __( 'Optional footer widgets.', 'social-discovery' ), 'before_widget' => '<section class="sd-widget">', 'after_widget' => '</section>', 'before_title' => '<h3>', 'after_title' => '</h3>' ) ); }
add_action( 'widgets_init', 'sd_widgets' );

function sd_customizer( $wp_customize ) {
	$wp_customize->add_section( 'sd_design', array( 'title' => __( 'Social Discovery Design', 'social-discovery' ), 'priority' => 30 ) );
	$wp_customize->add_setting( 'sd_primary_color', array( 'default' => '#2563EB', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sd_primary_color', array( 'label' => __( 'Primary Color', 'social-discovery' ), 'section' => 'sd_design' ) ) );
	$wp_customize->add_setting( 'sd_secondary_color', array( 'default' => '#7C3AED', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sd_secondary_color', array( 'label' => __( 'Secondary Color', 'social-discovery' ), 'section' => 'sd_design' ) ) );
	$wp_customize->add_setting( 'sd_header_layout', array( 'default' => 'default', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'sd_header_layout', array( 'label' => __( 'Header Layout', 'social-discovery' ), 'section' => 'sd_design', 'type' => 'select', 'choices' => array( 'default' => 'Default', 'centered' => 'Centered', 'minimal' => 'Minimal' ) ) );
	$wp_customize->add_setting( 'sd_footer_layout', array( 'default' => 'four-column', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'sd_footer_layout', array( 'label' => __( 'Footer Layout', 'social-discovery' ), 'section' => 'sd_design', 'type' => 'select', 'choices' => array( 'four-column' => 'Four Column', 'centered' => 'Centered', 'minimal' => 'Minimal' ) ) );
	$wp_customize->add_setting( 'sd_dark_mode', array( 'default' => 'system', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'sd_dark_mode', array( 'label' => __( 'Color Mode', 'social-discovery' ), 'section' => 'sd_design', 'type' => 'select', 'choices' => array( 'system' => 'System', 'light' => 'Light', 'dark' => 'Dark' ) ) );
	$wp_customize->add_setting( 'sd_sticky_header', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
	$wp_customize->add_control( 'sd_sticky_header', array( 'label' => __( 'Sticky Header', 'social-discovery' ), 'section' => 'sd_design', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'sd_customizer' );

function sd_customizer_css() { printf( '<style>:root{--sd-primary:%1$s;--sd-secondary:%2$s;}</style>', esc_attr( sd_get_option( 'sd_primary_color', '#2563EB' ) ), esc_attr( sd_get_option( 'sd_secondary_color', '#7C3AED' ) ) ); }
add_action( 'wp_head', 'sd_customizer_css' );

function sd_body_classes( $classes ) { $classes[] = 'sd-theme'; $classes[] = 'sd-header-' . sanitize_html_class( sd_get_option( 'sd_header_layout', 'default' ) ); return $classes; }
add_filter( 'body_class', 'sd_body_classes' );

function sd_elementor_support() { if ( did_action( 'elementor/loaded' ) ) { add_theme_support( 'elementor' ); } }
add_action( 'after_setup_theme', 'sd_elementor_support', 20 );

require_once get_template_directory() . '/inc/template-tags.php';
