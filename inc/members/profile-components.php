<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_member_display_name( $user_id ) { return function_exists( 'bp_core_get_user_displayname' ) ? bp_core_get_user_displayname( $user_id ) : get_the_author_meta( 'display_name', $user_id ); }
function sd_member_bio( $user_id ) { if ( function_exists( 'xprofile_get_field_id_from_name' ) && function_exists( 'xprofile_get_field_data' ) ) { $field = xprofile_get_field_id_from_name( 'About Me' ); if ( $field ) { return xprofile_get_field_data( $field, $user_id ); } } return get_the_author_meta( 'description', $user_id ); }
function sd_member_interests( $user_id ) { return function_exists( 'sd_core_user_interests' ) ? sd_core_user_interests( $user_id ) : array(); }
