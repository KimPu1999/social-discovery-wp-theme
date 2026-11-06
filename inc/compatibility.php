<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_compatibility() { if ( function_exists( 'bp_is_active' ) ) { add_theme_support( 'buddypress' ); } }
add_action( 'after_setup_theme', 'sd_compatibility', 20 );
