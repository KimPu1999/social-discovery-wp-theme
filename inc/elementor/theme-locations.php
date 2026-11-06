<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_elementor_register_locations( $locations_manager ) { if ( method_exists( $locations_manager, 'register_all_core_location' ) ) { $locations_manager->register_all_core_location(); } }
add_action( 'elementor/theme/register_locations', 'sd_elementor_register_locations' );
