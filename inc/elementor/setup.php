<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_elementor_homepage_support() { if ( did_action( 'elementor/loaded' ) ) { add_theme_support( 'elementor' ); } }
add_action( 'after_setup_theme', 'sd_elementor_homepage_support', 21 );
