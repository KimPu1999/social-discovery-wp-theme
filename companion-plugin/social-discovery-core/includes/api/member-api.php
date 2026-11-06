<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_api_connection( WP_REST_Request $request ) { if ( sd_core_rate_limited( 'connection', 30 ) ) { return new WP_Error( 'rate_limited', __( 'Please wait before changing connections again.', 'social-discovery-core' ), array( 'status' => 429 ) ); } $result = sd_core_connection_action( absint( $request->get_param( 'member_id' ) ), sanitize_key( $request->get_param( 'connection_action' ) ) ); return is_wp_error( $result ) ? $result : rest_ensure_response( array( 'status' => $result ) ); }
