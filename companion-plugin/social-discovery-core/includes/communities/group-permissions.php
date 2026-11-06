<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_group_visible( $group_id ) {
	if ( ! function_exists( 'groups_get_group' ) ) { return false; }
	$group = groups_get_group( absint( $group_id ) );
	if ( ! $group || 'hidden' !== $group->status ) { return (bool) $group; }
	return is_user_logged_in() && ( (int) $group->creator_id === get_current_user_id() || ( function_exists( 'groups_is_user_member' ) && groups_is_user_member( get_current_user_id(), $group->id ) ) );
}
function sd_core_group_can_manage( $group_id, $user_id = 0 ) {
	$user_id = $user_id ? absint( $user_id ) : get_current_user_id();
	return $user_id && ( ( function_exists( 'groups_is_user_admin' ) && groups_is_user_admin( $user_id, absint( $group_id ) ) ) || ( function_exists( 'groups_is_user_mod' ) && groups_is_user_mod( $user_id, absint( $group_id ) ) ) );
}
