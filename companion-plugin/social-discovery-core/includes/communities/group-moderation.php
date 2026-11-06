<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_group_member_action( $group_id, $user_id, $action ) {
	if ( ! sd_core_group_can_manage( $group_id ) || ! function_exists( 'groups_remove_member' ) ) { return new WP_Error( 'forbidden', __( 'You cannot manage this community.', 'social-discovery-core' ), array( 'status' => 403 ) ); }
	if ( 'remove' === $action ) { return groups_remove_member( absint( $user_id ), absint( $group_id ) ) ? true : new WP_Error( 'member_action_failed', __( 'The member could not be removed.', 'social-discovery-core' ) ); }
	return new WP_Error( 'unsupported_action', __( 'That member action is unavailable.', 'social-discovery-core' ) );
}
