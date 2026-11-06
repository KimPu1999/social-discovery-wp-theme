<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_messaging_assets() {
	if ( ! is_page_template( 'page-templates/messages.php' ) ) { return; }
	wp_enqueue_style( 'sd-messaging', SD_URI . '/assets/css/messaging.css', array( 'sd-style' ), SD_VERSION );
	wp_enqueue_script( 'sd-messaging', SD_URI . '/assets/js/messaging.js', array(), SD_VERSION, true );
	wp_localize_script( 'sd-messaging', 'sdMessaging', array( 'restUrl' => esc_url_raw( rest_url( 'social-discovery/v1/' ) ), 'nonce' => wp_create_nonce( 'wp_rest' ), 'messagesUrl' => esc_url_raw( sd_home_url( 'messages' ) ) ) );
}
add_action( 'wp_enqueue_scripts', 'sd_messaging_assets' );
