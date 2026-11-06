<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_can_edit_user( $user_id ) { return current_user_can( 'edit_user', $user_id ) || ( get_current_user_id() === absint( $user_id ) ); }
function sd_core_current_user_required() { if ( ! is_user_logged_in() ) { wp_safe_redirect( wp_login_url() ); exit; } return get_current_user_id(); }
function sd_core_moderation_capabilities() { return array( 'sd_view_reports', 'sd_review_reports', 'sd_moderate_activity', 'sd_moderate_groups', 'sd_manage_member_restrictions', 'sd_view_audit_logs', 'sd_manage_safety_settings' ); }
function sd_core_register_capabilities() { foreach ( array( 'administrator', 'sd_moderator' ) as $role_name ) { $role = get_role( $role_name ); if ( $role ) { foreach ( sd_core_moderation_capabilities() as $cap ) { $role->add_cap( $cap ); } } } }
add_action( 'init', 'sd_core_register_capabilities' );
function sd_core_can_moderate( $capability = 'sd_view_reports' ) { return current_user_can( $capability ); }
