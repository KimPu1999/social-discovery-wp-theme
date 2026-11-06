<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_registration_enabled() { return (bool) get_option( 'users_can_register' ); }
function sd_core_register_handler() {
	if ( ! sd_core_form_nonce( 'sd_register' ) || ! sd_core_registration_enabled() ) { sd_core_auth_redirect( 'registration-disabled' ); }
	if ( sd_core_rate_limited( 'register', 8 ) ) { sd_core_auth_redirect( 'rate-limited', wp_get_referer() ); }
	$username = sanitize_user( sd_core_post_text( 'user_login' ), true ); $email = sanitize_email( sd_core_post_text( 'user_email' ) ); $password = isset( $_POST['user_pass'] ) ? (string) wp_unslash( $_POST['user_pass'] ) : ''; $confirm = isset( $_POST['user_pass_confirm'] ) ? (string) wp_unslash( $_POST['user_pass_confirm'] ) : ''; $display = sd_core_post_text( 'display_name' ); $consent = ! empty( $_POST['terms_consent'] ); $errors = new WP_Error();
	if ( ! $username || ! validate_username( $username ) ) { $errors->add( 'username', __( 'Please enter a valid username.', 'social-discovery-core' ) ); } elseif ( username_exists( $username ) ) { $errors->add( 'username_exists', __( 'That username is not available.', 'social-discovery-core' ) ); }
	if ( ! is_email( $email ) ) { $errors->add( 'email', __( 'Please enter a valid email address.', 'social-discovery-core' ) ); } elseif ( email_exists( $email ) ) { $errors->add( 'email_exists', __( 'That email address is already in use.', 'social-discovery-core' ) ); }
	if ( strlen( $password ) < 8 ) { $errors->add( 'password', __( 'Choose a password with at least 8 characters.', 'social-discovery-core' ) ); } if ( ! hash_equals( $password, $confirm ) ) { $errors->add( 'password_match', __( 'Passwords do not match.', 'social-discovery-core' ) ); } if ( ! $consent ) { $errors->add( 'consent', __( 'Please accept the Terms and Privacy Policy to continue.', 'social-discovery-core' ) ); }
	if ( $errors->has_errors() ) { set_transient( 'sd_register_errors_' . wp_get_session_token(), $errors->get_error_messages(), MINUTE_IN_SECONDS ); sd_core_auth_redirect( 'invalid-registration', wp_get_referer() ); }
	$role = get_option( 'default_role', 'subscriber' ); $editable_roles = get_editable_roles(); if ( ! isset( $editable_roles[ $role ] ) || in_array( $role, array( 'administrator', 'editor' ), true ) ) { $role = 'subscriber'; }
	$user_id = wp_insert_user( array( 'user_login' => $username, 'user_email' => $email, 'user_pass' => $password, 'display_name' => $display ?: $username, 'role' => $role ) ); if ( is_wp_error( $user_id ) ) { sd_core_auth_redirect( 'registration-error', wp_get_referer() ); }
	update_user_meta( $user_id, 'sd_terms_consent_at', time() ); update_user_meta( $user_id, 'sd_onboarding_step', 1 ); do_action( 'sd_core_user_registered', $user_id ); wp_set_auth_cookie( $user_id, false, is_ssl() ); wp_safe_redirect( sd_core_page_url( 'onboarding', '/' ) ); exit;
}
add_action( 'admin_post_nopriv_sd_register', 'sd_core_register_handler' );
add_action( 'admin_post_sd_register', 'sd_core_register_handler' );

function sd_core_login_handler() { if ( ! sd_core_form_nonce( 'sd_login' ) ) { sd_core_auth_redirect( 'login-error' ); } if ( sd_core_rate_limited( 'login', 10 ) ) { sd_core_auth_redirect( 'rate-limited', wp_get_referer() ); } $creds = array( 'user_login' => sd_core_post_text( 'log' ), 'user_password' => isset( $_POST['pwd'] ) ? (string) wp_unslash( $_POST['pwd'] ) : '', 'remember' => ! empty( $_POST['rememberme'] ) ); $user = wp_signon( $creds, is_ssl() ); if ( is_wp_error( $user ) ) { sd_core_auth_redirect( 'login-error', wp_get_referer() ); } $redirect = sd_core_safe_redirect( isset( $_POST['redirect_to'] ) ? wp_unslash( $_POST['redirect_to'] ) : '', sd_core_page_url( 'onboarding', '/' ) ); wp_safe_redirect( $redirect ); exit; }
add_action( 'admin_post_nopriv_sd_login', 'sd_core_login_handler' ); add_action( 'admin_post_sd_login', 'sd_core_login_handler' );
