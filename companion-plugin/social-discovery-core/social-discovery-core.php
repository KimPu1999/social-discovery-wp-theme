<?php
/**
 * Plugin Name: Social Discovery Core
 * Description: Companion features for onboarding, profile privacy, and secure member forms.
 * Version: 1.1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: social-discovery-core
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'SD_CORE_VERSION', '1.1.0' );
define( 'SD_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SD_CORE_URL', plugin_dir_url( __FILE__ ) );
foreach ( array( 'security/validation.php', 'security/capabilities.php', 'security/privacy.php', 'authentication/rate-limits.php', 'authentication/redirects.php', 'authentication/registration.php', 'authentication/email-verification.php', 'authentication/password.php', 'onboarding/interests.php', 'onboarding/onboarding-state.php', 'onboarding/onboarding-handler.php', 'profiles/profile-fields.php', 'profiles/profile-privacy.php', 'profiles/profile-updates.php' ) as $file ) { require_once SD_CORE_DIR . 'includes/' . $file; }
require_once SD_CORE_DIR . 'social-discovery-core-legacy.php';

function sd_core_enqueue_assets() { if ( ! is_admin() ) { wp_enqueue_style( 'sd-core', SD_CORE_URL . 'assets/core.css', array(), SD_CORE_VERSION ); } }
add_action( 'wp_enqueue_scripts', 'sd_core_enqueue_assets' );
function sd_core_activate() { if ( ! get_role( 'sd_moderator' ) ) { add_role( 'sd_moderator', __( 'Community Moderator', 'social-discovery-core' ), array( 'read' => true, 'edit_sd_reports' => true, 'read_sd_reports' => true ) ); } }
register_activation_hook( __FILE__, 'sd_core_activate' );
