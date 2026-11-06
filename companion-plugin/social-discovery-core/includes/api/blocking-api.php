<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_api_block( WP_REST_Request $request ) { $id = absint( $request->get_param( 'user_id' ) ); $result = 'unblock' === sanitize_key( $request->get_param( 'action' ) ) ? sd_core_unblock_user( $id ) : sd_core_block_user( $id ); return is_wp_error( $result ) ? $result : rest_ensure_response( array( 'updated' => true, 'blocked' => 'unblock' !== sanitize_key( $request->get_param( 'action' ) ) ) ); }
