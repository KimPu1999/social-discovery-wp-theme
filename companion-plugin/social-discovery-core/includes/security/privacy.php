<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_profile_visibility( $user_id ) { $value = get_user_meta( $user_id, 'sd_profile_visibility', true ); return in_array( $value, array( 'public', 'members', 'private' ), true ) ? $value : 'public'; }
function sd_core_can_view_profile( $user_id ) { $user_id = absint( $user_id ); if ( ! $user_id ) { return false; } if ( current_user_can( 'manage_options' ) || get_current_user_id() === $user_id ) { return true; } $visibility = sd_core_profile_visibility( $user_id ); return 'public' === $visibility || ( 'members' === $visibility && is_user_logged_in() ); }
