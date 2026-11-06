<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_dashboard_url( $path = '' ) { return sd_home_url( 'dashboard' . ( $path ? '/' . ltrim( $path, '/' ) : '' ) ); }
function sd_dashboard_require_login() { if ( ! is_user_logged_in() ) { auth_redirect(); } }
function sd_profile_completion( $user_id = 0 ) {
	$user_id = $user_id ? absint( $user_id ) : get_current_user_id(); $user = get_userdata( $user_id ); if ( ! $user ) { return array( 'percent' => 0, 'missing' => array() ); }
	$has_avatar = function_exists( 'bp_get_user_has_avatar' ) ? (bool) bp_get_user_has_avatar( $user_id ) : false;
	$checks = array( 'name' => (bool) $user->display_name, 'bio' => (bool) $user->description, 'avatar' => $has_avatar, 'interests' => function_exists( 'sd_core_user_interests' ) ? (bool) sd_core_user_interests( $user_id ) : (bool) get_user_meta( $user_id, 'sd_user_interests', true ), 'privacy' => (bool) get_user_meta( $user_id, 'sd_profile_visibility', true ) );
	$labels = array( 'name' => __( 'Add a display name', 'social-discovery' ), 'bio' => __( 'Write a short biography', 'social-discovery' ), 'avatar' => __( 'Add a profile photo', 'social-discovery' ), 'interests' => __( 'Choose your interests', 'social-discovery' ), 'privacy' => __( 'Review privacy preferences', 'social-discovery' ) ); $missing = array(); foreach ( $checks as $key => $complete ) { if ( ! $complete ) { $missing[ $key ] = $labels[ $key ]; } }
	return array( 'percent' => (int) round( count( array_filter( $checks ) ) / count( $checks ) * 100 ), 'missing' => $missing );
}
function sd_dashboard_counts() {
	$counts = array( 'communities' => null, 'connections' => null, 'notifications' => null, 'messages' => null, 'saved' => null );
	if ( function_exists( 'groups_get_user_groups' ) ) { $groups = groups_get_user_groups( get_current_user_id() ); $counts['communities'] = ! empty( $groups['total'] ) ? absint( $groups['total'] ) : 0; }
	if ( function_exists( 'friends_get_total_friend_count' ) ) { $counts['connections'] = absint( friends_get_total_friend_count( get_current_user_id() ) ); }
	if ( function_exists( 'sd_notification_unread_count' ) ) { $counts['notifications'] = sd_notification_unread_count(); }
	if ( function_exists( 'bp_get_total_unread_messages_count' ) ) { $counts['messages'] = absint( bp_get_total_unread_messages_count( get_current_user_id() ) ); }
	if ( function_exists( 'sd_core_saved_activity_ids' ) ) { $counts['saved'] = count( sd_core_saved_activity_ids() ); }
	return $counts;
}
