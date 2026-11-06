<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_save_privacy( $user_id ) { $value = sd_core_post_text( 'profile_visibility', 'public' ); if ( ! in_array( $value, array( 'public', 'members', 'private' ), true ) ) { $value = 'public'; } update_user_meta( $user_id, 'sd_profile_visibility', $value ); return $value; }
function sd_core_privacy_handler() { $user_id = sd_core_current_user_required(); if ( ! sd_core_form_nonce( 'sd_privacy' ) || ! sd_core_can_edit_user( $user_id ) ) { wp_die( esc_html__( 'This request could not be verified.', 'social-discovery-core' ), 403 ); } sd_core_save_privacy( $user_id ); wp_safe_redirect( add_query_arg( 'sd_profile', 'saved', sd_core_page_url( 'account-settings', '/' ) ) ); exit; }
add_action( 'admin_post_sd_save_privacy', 'sd_core_privacy_handler' );
