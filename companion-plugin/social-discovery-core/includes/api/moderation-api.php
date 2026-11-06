<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_api_report_update( WP_REST_Request $request ) { $result = sd_core_update_report( absint( $request->get_param( 'report_id' ) ), sanitize_key( $request->get_param( 'status' ) ), $request->get_param( 'note' ) ); return is_wp_error( $result ) ? $result : rest_ensure_response( array( 'updated' => true ) ); }
