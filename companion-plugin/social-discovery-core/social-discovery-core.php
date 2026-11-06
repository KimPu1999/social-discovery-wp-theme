<?php
/**
 * Plugin Name: Social Discovery Core
 * Description: Companion features for onboarding, profile privacy, and secure member forms.
 * Version: 1.2.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: social-discovery-core
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'SD_CORE_VERSION', '1.2.0' );
define( 'SD_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SD_CORE_URL', plugin_dir_url( __FILE__ ) );
foreach ( array( 'security/validation.php', 'security/capabilities.php', 'security/privacy.php', 'authentication/rate-limits.php', 'authentication/redirects.php', 'authentication/registration.php', 'authentication/email-verification.php', 'authentication/password.php', 'onboarding/interests.php', 'onboarding/onboarding-state.php', 'onboarding/onboarding-handler.php', 'profiles/profile-fields.php', 'profiles/profile-privacy.php', 'profiles/profile-updates.php' ) as $file ) { require_once SD_CORE_DIR . 'includes/' . $file; }
require_once SD_CORE_DIR . 'social-discovery-core-legacy.php';
foreach ( array( 'social/activity-permissions.php', 'social/saved-activities.php', 'social/connections.php', 'discovery/interest-matching.php', 'discovery/discovery-engine.php', 'discovery/recommendations.php', 'discovery/discovery-filters.php', 'api/activity-api.php', 'api/discovery-api.php', 'api/member-api.php' ) as $file ) { require_once SD_CORE_DIR . 'includes/' . $file; }

function sd_core_enqueue_assets() { if ( ! is_admin() ) { wp_enqueue_style( 'sd-core', SD_CORE_URL . 'assets/core.css', array(), SD_CORE_VERSION ); } }
add_action( 'wp_enqueue_scripts', 'sd_core_enqueue_assets' );
function sd_core_register_api_routes() { register_rest_route( 'social-discovery/v1', '/activity', array( 'methods' => 'POST', 'callback' => 'sd_core_api_activity_create', 'permission_callback' => 'sd_core_rest_permission' ) ); register_rest_route( 'social-discovery/v1', '/activity/comment', array( 'methods' => 'POST', 'callback' => 'sd_core_api_activity_comment', 'permission_callback' => 'sd_core_rest_permission' ) ); register_rest_route( 'social-discovery/v1', '/activity/favorite', array( 'methods' => 'POST', 'callback' => 'sd_core_api_activity_favorite', 'permission_callback' => 'sd_core_rest_permission' ) ); register_rest_route( 'social-discovery/v1', '/activity/save', array( 'methods' => 'POST', 'callback' => 'sd_core_api_save_activity', 'permission_callback' => 'sd_core_rest_permission' ) ); register_rest_route( 'social-discovery/v1', '/connections', array( 'methods' => 'POST', 'callback' => 'sd_core_api_connection', 'permission_callback' => 'sd_core_rest_permission' ) ); register_rest_route( 'social-discovery/v1', '/recommendations', array( 'methods' => 'GET', 'callback' => 'sd_core_api_recommendations', 'permission_callback' => 'sd_core_rest_permission' ) ); }
add_action( 'rest_api_init', 'sd_core_register_api_routes' );
function sd_core_activate() { if ( ! get_role( 'sd_moderator' ) ) { add_role( 'sd_moderator', __( 'Community Moderator', 'social-discovery-core' ), array( 'read' => true, 'edit_sd_reports' => true, 'read_sd_reports' => true ) ); } }
register_activation_hook( __FILE__, 'sd_core_activate' );
