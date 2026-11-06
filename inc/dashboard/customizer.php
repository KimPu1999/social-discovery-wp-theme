<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_customizer_dashboard( $wp_customize ) {
	$wp_customize->add_section( 'sd_dashboard', array( 'title' => __( 'Social Discovery Dashboard', 'social-discovery' ), 'panel' => 'sd_settings' ) );
	$settings = array( 'sd_dashboard_layout' => array( 'default', array( 'default' => 'Default', 'wide' => 'Wide' ) ), 'sd_dashboard_sidebar' => array( 'left', array( 'left' => 'Left', 'right' => 'Right' ) ), 'sd_dashboard_spacing' => array( 'comfortable', array( 'comfortable' => 'Comfortable', 'compact' => 'Compact' ) ), 'sd_notification_card_style' => array( 'default', array( 'default' => 'Default', 'bordered' => 'Bordered' ) ) );
	foreach ( $settings as $id => $config ) { $wp_customize->add_setting( $id, array( 'default' => $config[0], 'sanitize_callback' => 'sd_sanitize_select' ) ); $wp_customize->add_control( $id, array( 'label' => ucwords( str_replace( '_', ' ', str_replace( 'sd_', '', $id ) ) ), 'section' => 'sd_dashboard', 'type' => 'select', 'choices' => $config[1] ) ); }
	$wp_customize->add_setting( 'sd_dashboard_compact', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) ); $wp_customize->add_control( 'sd_dashboard_compact', array( 'label' => __( 'Compact sidebar', 'social-discovery' ), 'section' => 'sd_dashboard', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'sd_notification_preview_count', array( 'default' => 5, 'sanitize_callback' => 'sd_sanitize_positive_int' ) ); $wp_customize->add_control( 'sd_notification_preview_count', array( 'label' => __( 'Notification preview count', 'social-discovery' ), 'section' => 'sd_dashboard', 'type' => 'number', 'input_attrs' => array( 'min' => 1, 'max' => 10 ) ) );
}
add_action( 'customize_register', 'sd_customizer_dashboard' );
