<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function sd_communities_assets() {
	if ( ! is_page_template( array( 'page-templates/communities.php', 'page-templates/my-communities.php' ) ) ) { return; }
	foreach ( array( 'communities', 'group-details', 'group-management', 'communities-responsive' ) as $style ) {
		wp_enqueue_style( 'sd-' . $style, SD_URI . '/assets/css/' . $style . '.css', array( 'sd-style' ), SD_VERSION );
	}
	foreach ( array( 'communities', 'group-membership', 'group-management' ) as $script ) {
		wp_enqueue_script( 'sd-' . $script, SD_URI . '/assets/js/' . $script . '.js', array(), SD_VERSION, true );
	}
	wp_localize_script( 'sd-communities', 'sdCommunities', array( 'restUrl' => esc_url_raw( rest_url( 'social-discovery/v1/' ) ), 'nonce' => wp_create_nonce( 'wp_rest' ) ) );
}
add_action( 'wp_enqueue_scripts', 'sd_communities_assets' );
