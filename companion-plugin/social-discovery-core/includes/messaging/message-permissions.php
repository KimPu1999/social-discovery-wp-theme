<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_message_thread_allowed( $thread_id, $user_id = 0 ) {
	$user_id = $user_id ? absint( $user_id ) : get_current_user_id();
	if ( ! $user_id || ! function_exists( 'messages_get_message_thread' ) ) { return false; }
	$thread = messages_get_message_thread( absint( $thread_id ) );
	if ( ! $thread || empty( $thread->messages ) ) { return false; }
	foreach ( $thread->messages as $message ) { if ( (int) $message->sender_id === $user_id || ( ! empty( $message->recipients ) && isset( $message->recipients[ $user_id ] ) ) ) { return true; } }
	return false;
}
