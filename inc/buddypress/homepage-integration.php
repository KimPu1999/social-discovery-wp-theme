<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_buddypress_homepage_available( $component = '' ) { if ( ! function_exists( 'bp_is_active' ) ) { return false; } return $component ? bp_is_active( $component ) : true; }
