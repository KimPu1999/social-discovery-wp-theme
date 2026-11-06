<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_homepage_assets() { if ( is_front_page() ) { wp_enqueue_style( 'sd-homepage', SD_URI . '/assets/css/homepage.css', array( 'sd-style' ), SD_VERSION ); wp_enqueue_style( 'sd-homepage-responsive', SD_URI . '/assets/css/homepage-responsive.css', array( 'sd-homepage' ), SD_VERSION ); wp_enqueue_script( 'sd-homepage', SD_URI . '/assets/js/homepage.js', array(), SD_VERSION, true ); wp_enqueue_script( 'sd-homepage-interactions', SD_URI . '/assets/js/homepage-interactions.js', array( 'sd-homepage' ), SD_VERSION, true ); } }
add_action( 'wp_enqueue_scripts', 'sd_homepage_assets' );
function sd_homepage_register_image_size() { add_image_size( 'sd-home-hero', 1200, 800, true ); }
add_action( 'after_setup_theme', 'sd_homepage_register_image_size' );
