<?php
/** Social Discovery theme bootstrap. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'SD_VERSION', '1.0.0' );
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
