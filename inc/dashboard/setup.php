<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_dashboard_assets() {
	if ( ! is_page_template( array( 'page-templates/member-dashboard.php', 'page-templates/notification-center.php', 'page-templates/personal-workspace.php' ) ) ) { return; }
	foreach ( array( 'member-dashboard', 'notifications', 'personal-workspace', 'dashboard-responsive' ) as $style ) { wp_enqueue_style( 'sd-' . $style, SD_URI . '/assets/css/' . $style . '.css', array( 'sd-style' ), SD_VERSION ); }
	foreach ( array( 'dashboard', 'notifications', 'workspace' ) as $script ) { wp_enqueue_script( 'sd-' . $script, SD_URI . '/assets/js/' . $script . '.js', array(), SD_VERSION, true ); }
	wp_localize_script( 'sd-dashboard', 'sdDashboard', array( 'restUrl' => esc_url_raw( rest_url( 'social-discovery/v1/' ) ), 'nonce' => wp_create_nonce( 'wp_rest' ), 'dashboardUrl' => esc_url_raw( sd_home_url( 'dashboard' ) ) ) );
}
add_action( 'wp_enqueue_scripts', 'sd_dashboard_assets' );
