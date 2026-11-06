<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_dashboard_data( $user_id = 0 ) { $user_id = $user_id ? absint( $user_id ) : get_current_user_id(); if ( ! sd_core_dashboard_owner( $user_id ) ) { return new WP_Error( 'forbidden', __( 'Dashboard data is private.', 'social-discovery-core' ), array( 'status' => 403 ) ); } return array( 'user_id' => $user_id, 'profile_completion' => sd_core_profile_completion( $user_id ), 'saved_count' => function_exists( 'sd_core_saved_activity_ids' ) ? count( sd_core_saved_activity_ids( $user_id ) ) : null ); }
