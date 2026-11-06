<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_register_interest_taxonomy() { register_taxonomy( 'sd_interest', array( 'post' ), array( 'public' => true, 'show_ui' => true, 'show_in_rest' => true, 'labels' => array( 'name' => __( 'Interests', 'social-discovery-core' ) ) ) ); }
add_action( 'init', 'sd_core_register_interest_taxonomy' );
function sd_core_register_report_cpt() { register_post_type( 'sd_report', array( 'labels' => array( 'name' => __( 'Reports', 'social-discovery-core' ), 'singular_name' => __( 'Report', 'social-discovery-core' ) ), 'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'supports' => array( 'title', 'editor', 'custom-fields' ), 'capability_type' => 'manage_options', 'map_meta_cap' => true ) ); }
add_action( 'init', 'sd_core_register_report_cpt' );
