<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_public_groups( $args = array() ) {
	if ( ! function_exists( 'groups_get_groups' ) ) { return array( 'groups' => array(), 'total' => 0 ); }
	$args = wp_parse_args( $args, array( 'per_page' => 12, 'page' => 1, 'show_hidden' => false, 'type' => 'active' ) );
	$args['per_page'] = min( 24, max( 1, absint( $args['per_page'] ) ) );
	$result = groups_get_groups( $args );
	$result['groups'] = array_values( array_filter( (array) $result['groups'], function( $group ) { return 'hidden' !== $group->status; } ) );
	return $result;
}
