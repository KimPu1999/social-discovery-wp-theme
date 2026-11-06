<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_bp_field_id( $name ) { return function_exists( 'xprofile_get_field_id_from_name' ) ? absint( xprofile_get_field_id_from_name( $name ) ) : 0; }
function sd_core_profile_field( $user_id, $name, $fallback = '' ) { $field_id = sd_core_bp_field_id( $name ); if ( $field_id && function_exists( 'xprofile_get_field_data' ) ) { $value = xprofile_get_field_data( $field_id, $user_id ); return $value ?: $fallback; } return $fallback; }
function sd_core_set_profile_field( $user_id, $name, $value ) { $field_id = sd_core_bp_field_id( $name ); if ( $field_id && function_exists( 'xprofile_set_field_data' ) ) { return xprofile_set_field_data( $field_id, $user_id, $value ); } return false; }
