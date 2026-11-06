<?php
/** Social Discovery theme bootstrap. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'SD_VERSION', '1.1.0' );
define( 'SD_DIR', get_template_directory() );
define( 'SD_URI', get_template_directory_uri() );
require_once SD_DIR . '/inc/theme-defaults.php';
require_once SD_DIR . '/inc/setup.php';
require_once SD_DIR . '/inc/enqueue.php';
require_once SD_DIR . '/inc/customizer.php';
require_once SD_DIR . '/inc/customizer-header.php';
require_once SD_DIR . '/inc/customizer-footer.php';
require_once SD_DIR . '/inc/customizer-design.php';
require_once SD_DIR . '/inc/template-functions.php';
require_once SD_DIR . '/inc/navigation.php';
require_once SD_DIR . '/inc/compatibility.php';
require_once SD_DIR . '/inc/homepage/setup.php';
require_once SD_DIR . '/inc/homepage/functions.php';
require_once SD_DIR . '/inc/homepage/sections.php';
require_once SD_DIR . '/inc/homepage/helpers.php';
require_once SD_DIR . '/inc/homepage/content-sources.php';
require_once SD_DIR . '/inc/homepage/customizer.php';
require_once SD_DIR . '/inc/elementor/setup.php';
require_once SD_DIR . '/inc/elementor/theme-locations.php';
require_once SD_DIR . '/inc/elementor/compatibility.php';
require_once SD_DIR . '/inc/buddypress/homepage-integration.php';
require_once SD_DIR . '/inc/auth/auth-templates.php';
require_once SD_DIR . '/inc/auth/auth-navigation.php';
require_once SD_DIR . '/inc/auth/auth-design.php';
require_once SD_DIR . '/inc/members/profile-template.php';
require_once SD_DIR . '/inc/members/profile-components.php';
require_once SD_DIR . '/inc/members/profile-navigation.php';
require_once SD_DIR . '/inc/onboarding/onboarding-templates.php';
