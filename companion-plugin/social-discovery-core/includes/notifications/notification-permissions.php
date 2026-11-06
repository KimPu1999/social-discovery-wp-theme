<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_notification_owner( $notification_id, $user_id = 0 ) {
	$user_id = $user_id ? absint( $user_id ) : get_current_user_id(); if ( ! $user_id || ! function_exists( 'bp_notifications_get_specific_notifications' ) ) { return false; }
	$result = bp_notifications_get_specific_notifications( array( 'id' => absint( $notification_id ), 'user_id' => $user_id ) ); return ! empty( $result['notifications'] );
}
