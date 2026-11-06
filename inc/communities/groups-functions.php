<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function sd_groups_available() { return function_exists( 'groups_get_groups' ) && function_exists( 'bp_is_active' ) && bp_is_active( 'groups' ); }
function sd_groups_visible( $group ) {
	if ( ! is_object( $group ) ) { return false; }
	if ( 'hidden' !== $group->status ) { return true; }
	return is_user_logged_in() && ( (int) $group->creator_id === get_current_user_id() || ( function_exists( 'groups_is_user_member' ) && groups_is_user_member( get_current_user_id(), $group->id ) ) );
}
function sd_groups_query( $args = array() ) {
	if ( ! sd_groups_available() ) { return array( 'groups' => array(), 'total' => 0 ); }
	$defaults = array( 'per_page' => 12, 'page' => 1, 'show_hidden' => false, 'type' => 'active' );
	$args = wp_parse_args( $args, $defaults );
	$args['per_page'] = min( 24, max( 1, absint( $args['per_page'] ) ) );
	$args['page'] = max( 1, absint( $args['page'] ) );
	$result = groups_get_groups( $args );
	$result['groups'] = array_values( array_filter( (array) $result['groups'], 'sd_groups_visible' ) );
	return $result;
}
function sd_group_url( $group_id ) { return add_query_arg( 'group_id', absint( $group_id ), sd_home_url( 'communities' ) ); }
function sd_group_status( $group_id, $user_id = 0 ) {
	$group_id = absint( $group_id ); $user_id = $user_id ? absint( $user_id ) : get_current_user_id();
	if ( ! $group_id || ! $user_id || ! sd_groups_available() ) { return 'guest'; }
	if ( function_exists( 'groups_is_user_banned' ) && groups_is_user_banned( $user_id, $group_id ) ) { return 'banned'; }
	if ( function_exists( 'groups_is_user_admin' ) && groups_is_user_admin( $user_id, $group_id ) ) { return 'admin'; }
	if ( function_exists( 'groups_is_user_mod' ) && groups_is_user_mod( $user_id, $group_id ) ) { return 'mod'; }
	if ( function_exists( 'groups_is_user_member' ) && groups_is_user_member( $user_id, $group_id ) ) { return 'member'; }
	return 'visitor';
}
function sd_current_group() {
	$id = isset( $_GET['group_id'] ) ? absint( $_GET['group_id'] ) : 0;
	if ( ! $id || ! sd_groups_available() ) { return false; }
	$groups = groups_get_groups( array( 'include' => array( $id ), 'show_hidden' => true, 'per_page' => 1 ) );
	return ! empty( $groups['groups'][0] ) && sd_groups_visible( $groups['groups'][0] ) ? $groups['groups'][0] : false;
}
