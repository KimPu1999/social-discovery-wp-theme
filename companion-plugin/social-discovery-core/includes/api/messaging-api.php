<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_api_message_send( WP_REST_Request $request ) {
	if ( ! function_exists( 'messages_new_message' ) || ! is_user_logged_in() ) { return new WP_Error( 'messaging_unavailable', __( 'Private messaging is unavailable.', 'social-discovery-core' ), array( 'status' => 503 ) ); }
	$recipient = absint( $request->get_param( 'recipient_id' ) ); $thread_id = absint( $request->get_param( 'thread_id' ) ); $subject = sanitize_text_field( $request->get_param( 'subject' ) ); $content = sanitize_textarea_field( $request->get_param( 'content' ) );
	if ( $thread_id ) {
		if ( ! sd_core_message_thread_allowed( $thread_id ) ) { return new WP_Error( 'thread_forbidden', __( 'That conversation is unavailable.', 'social-discovery-core' ), array( 'status' => 403 ) ); }
		$thread = messages_get_message_thread( $thread_id );
		if ( $thread && ! empty( $thread->messages ) ) { foreach ( $thread->messages as $message ) { if ( (int) $message->sender_id !== get_current_user_id() ) { $recipient = absint( $message->sender_id ); break; } } }
	}
	if ( ! $recipient || ! $content || $recipient === get_current_user_id() || ! sd_core_message_user_allowed( $recipient ) ) { return new WP_Error( 'invalid_message', __( 'That message could not be sent.', 'social-discovery-core' ), array( 'status' => 400 ) ); }
	if ( function_exists( 'sd_core_rate_limited' ) && sd_core_rate_limited( 'message_send', 15 ) ) { return new WP_Error( 'rate_limited', __( 'Please wait before sending another message.', 'social-discovery-core' ), array( 'status' => 429 ) ); }
	$thread = messages_new_message( array( 'sender_id' => get_current_user_id(), 'thread_id' => $thread_id, 'recipients' => array( $recipient ), 'subject' => $subject ? $subject : __( 'Message', 'social-discovery-core' ), 'content' => $content ) );
	return $thread ? rest_ensure_response( array( 'thread_id' => absint( $thread ) ) ) : new WP_Error( 'message_failed', __( 'The message could not be sent.', 'social-discovery-core' ), array( 'status' => 500 ) );
}
function sd_core_api_message_state( WP_REST_Request $request ) {
	$thread_id = absint( $request->get_param( 'thread_id' ) ); $action = sanitize_key( $request->get_param( 'action' ) );
	if ( ! sd_core_message_thread_allowed( $thread_id ) ) { return new WP_Error( 'thread_forbidden', __( 'That conversation is unavailable.', 'social-discovery-core' ), array( 'status' => 403 ) ); }
	$result = false;
	if ( 'read' === $action && function_exists( 'messages_mark_thread_read' ) ) { $result = messages_mark_thread_read( $thread_id ); }
	elseif ( 'unread' === $action && function_exists( 'messages_mark_thread_unread' ) ) { $result = messages_mark_thread_unread( $thread_id ); }
	elseif ( 'delete' === $action && function_exists( 'messages_delete_thread' ) ) { $result = messages_delete_thread( $thread_id ); }
	return $result ? rest_ensure_response( array( 'updated' => true ) ) : new WP_Error( 'message_state_failed', __( 'That conversation action is unavailable.', 'social-discovery-core' ), array( 'status' => 400 ) );
}
