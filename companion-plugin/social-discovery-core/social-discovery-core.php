<?php
/**
 * Plugin Name: Social Discovery Core
 * Description: Optional companion plugin for persistent discovery, moderation, and privacy-aware member features.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: social-discovery-core
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'SD_CORE_VERSION', '1.0.0' );

function sd_core_register_interest_taxonomy() { register_taxonomy( 'sd_interest', array( 'user' ), array( 'public' => false, 'show_ui' => true, 'show_in_rest' => false, 'labels' => array( 'name' => __( 'Interests', 'social-discovery-core' ) ) ) ); }
add_action( 'init', 'sd_core_register_interest_taxonomy' );
function sd_core_register_report_cpt() { register_post_type( 'sd_report', array( 'labels' => array( 'name' => __( 'Reports', 'social-discovery-core' ), 'singular_name' => __( 'Report', 'social-discovery-core' ) ), 'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'supports' => array( 'title', 'editor', 'custom-fields' ), 'capability_type' => 'manage_options', 'map_meta_cap' => true ) ); }
add_action( 'init', 'sd_core_register_report_cpt' );
function sd_core_activate() { if ( ! get_role( 'sd_moderator' ) ) { add_role( 'sd_moderator', __( 'Community Moderator', 'social-discovery-core' ), array( 'read' => true, 'edit_sd_reports' => true, 'read_sd_reports' => true ) ); } }
register_activation_hook( __FILE__, 'sd_core_activate' );
function sd_core_enqueue() { if ( function_exists( 'wp_enqueue_script' ) ) { wp_enqueue_style( 'sd-core', plugins_url( 'assets/core.css', __FILE__ ), array(), SD_CORE_VERSION ); } }
add_action( 'wp_enqueue_scripts', 'sd_core_enqueue' );
