<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_message_user_allowed( $user_id ) {
	if ( ! $user_id || ! is_user_logged_in() ) { return false; }
	if ( function_exists( 'sd_core_blocking_allowed' ) && ! sd_core_blocking_allowed( $user_id ) ) { return false; }
	if ( function_exists( 'friends_check_friendship_status' ) && 'blocked' === friends_check_friendship_status( get_current_user_id(), absint( $user_id ) ) ) { return false; }
	return true;
}
