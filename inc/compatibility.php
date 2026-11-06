<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_compatibility() { if ( function_exists( 'bp_is_active' ) ) { add_theme_support( 'buddypress' ); } if ( did_action( 'elementor/loaded' ) ) { add_theme_support( 'elementor' ); } }
add_action( 'after_setup_theme', 'sd_compatibility', 20 );
function sd_elementor_locations( $locations_manager ) { if ( method_exists( $locations_manager, 'register_all_core_location' ) ) { $locations_manager->register_all_core_location(); } }
add_action( 'elementor/theme/register_locations', 'sd_elementor_locations' );
