<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_notification_assets() { if ( ! is_page_template( array( 'page-templates/member-dashboard.php', 'page-templates/notification-center.php', 'page-templates/personal-workspace.php' ) ) ) { return; } }
add_action( 'wp_enqueue_scripts', 'sd_notification_assets' );
