<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_customizer_communities( $wp_customize ) {
	$wp_customize->add_section( 'sd_communities', array( 'title' => __( 'Social Discovery Communities', 'social-discovery' ), 'panel' => 'sd_settings' ) );
	$settings = array(
		'sd_communities_layout' => array( 'grid', array( 'grid' => 'Grid', 'list' => 'List', 'compact' => 'Compact' ) ),
		'sd_communities_columns' => array( 3, array( 1 => '1', 2 => '2', 3 => '3', 4 => '4' ) ),
		'sd_community_header_layout' => array( 'cover', array( 'cover' => 'Cover header', 'compact' => 'Compact header' ) ),
		'sd_message_layout' => array( 'split', array( 'split' => 'Split view', 'stacked' => 'Stacked view' ) ),
	);
	foreach ( $settings as $id => $config ) {
		$wp_customize->add_setting( $id, array( 'default' => $config[0], 'sanitize_callback' => is_array( $config[1] ) ? 'sd_sanitize_select' : 'absint' ) );
		$wp_customize->add_control( $id, array( 'label' => ucwords( str_replace( '_', ' ', str_replace( 'sd_', '', $id ) ) ), 'section' => 'sd_communities', 'type' => 'select', 'choices' => $config[1] ) );
	}
}
add_action( 'customize_register', 'sd_customizer_communities' );
