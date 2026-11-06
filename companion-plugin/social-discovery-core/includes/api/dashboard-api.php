<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_api_dashboard() { $data = sd_core_dashboard_data(); return is_wp_error( $data ) ? $data : rest_ensure_response( $data ); }
