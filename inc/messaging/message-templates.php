<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_messages_available() { return function_exists( 'bp_is_active' ) && bp_is_active( 'messages' ) && function_exists( 'messages_get_message_thread' ); }
function sd_message_thread_url( $thread_id ) { return add_query_arg( 'thread_id', absint( $thread_id ), sd_home_url( 'messages' ) ); }
function sd_message_threads( $page = 1 ) {
	if ( ! sd_messages_available() || ! is_user_logged_in() || ! function_exists( 'bp_messages_get_message_threads' ) ) { return array( 'threads' => array(), 'total' => 0 ); }
	return bp_messages_get_message_threads( array( 'user_id' => get_current_user_id(), 'page' => max( 1, absint( $page ) ), 'per_page' => 20, 'box' => 'inbox' ) );
}
