<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function sd_group_action_label( $group_id ) {
	$status = sd_group_status( $group_id );
	$group = sd_current_group();
	if ( 'member' === $status || 'admin' === $status || 'mod' === $status ) { return __( 'Leave community', 'social-discovery' ); }
	if ( 'banned' === $status ) { return __( 'Membership restricted', 'social-discovery' ); }
	if ( $group && 'private' === $group->status ) { return __( 'Request to join', 'social-discovery' ); }
	return __( 'Join community', 'social-discovery' );
}
function sd_group_can_manage( $group_id ) { $status = sd_group_status( $group_id ); return in_array( $status, array( 'admin', 'mod' ), true ); }
