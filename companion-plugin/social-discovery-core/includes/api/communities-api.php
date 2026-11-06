<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_api_group_membership( WP_REST_Request $request ) {
	$group_id = absint( $request->get_param( 'group_id' ) ); $action = sanitize_key( $request->get_param( 'action' ) );
	if ( ! function_exists( 'groups_get_group' ) || ! $group_id || ! is_user_logged_in() ) { return new WP_Error( 'group_unavailable', __( 'That community is unavailable.', 'social-discovery-core' ), array( 'status' => 404 ) ); }
	$group = groups_get_group( $group_id );
	if ( ! $group || 'hidden' === $group->status && ! sd_core_group_visible( $group_id ) ) { return new WP_Error( 'group_forbidden', __( 'You cannot access that community.', 'social-discovery-core' ), array( 'status' => 403 ) ); }
	$uid = get_current_user_id(); $result = false;
	if ( 'leave' === $action && function_exists( 'groups_leave_group' ) ) { $result = groups_leave_group( $group_id, $uid ); }
	elseif ( 'join' === $action && 'public' === $group->status && function_exists( 'groups_join_group' ) ) { $result = groups_join_group( $group_id, $uid ); }
	elseif ( 'request' === $action && 'private' === $group->status && function_exists( 'groups_join_group' ) ) { $result = groups_join_group( $group_id, $uid ); }
	else { return new WP_Error( 'unsupported_group_action', __( 'That membership action is unavailable.', 'social-discovery-core' ), array( 'status' => 400 ) ); }
	return $result ? rest_ensure_response( array( 'status' => 'updated', 'group_id' => $group_id ) ) : new WP_Error( 'membership_failed', __( 'The membership change could not be saved.', 'social-discovery-core' ), array( 'status' => 400 ) );
}
function sd_core_api_group_create( WP_REST_Request $request ) {
	if ( ! is_user_logged_in() || ! function_exists( 'groups_create_group' ) ) { return new WP_Error( 'groups_unavailable', __( 'Community creation is unavailable.', 'social-discovery-core' ), array( 'status' => 503 ) ); }
	if ( function_exists( 'sd_core_rate_limited' ) && sd_core_rate_limited( 'group_create', 3 ) ) { return new WP_Error( 'rate_limited', __( 'Please wait before creating another community.', 'social-discovery-core' ), array( 'status' => 429 ) ); }
	$name = sanitize_text_field( $request->get_param( 'name' ) ); $description = wp_kses_post( $request->get_param( 'description' ) ); $status = sanitize_key( $request->get_param( 'status' ) );
	if ( ! $name || ! in_array( $status, array( 'public', 'private', 'hidden' ), true ) ) { return new WP_Error( 'invalid_group', __( 'Enter a name and choose a valid privacy setting.', 'social-discovery-core' ), array( 'status' => 400 ) ); }
	$group_id = groups_create_group( array( 'creator_id' => get_current_user_id(), 'name' => $name, 'description' => $description, 'status' => $status, 'enable_forum' => false ) );
	return $group_id ? rest_ensure_response( array( 'group_id' => absint( $group_id ) ) ) : new WP_Error( 'group_create_failed', __( 'The community could not be created.', 'social-discovery-core' ), array( 'status' => 500 ) );
}
