<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_post_text( $key, $default = '' ) { return isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : $default; }
function sd_core_post_textarea( $key, $default = '' ) { return isset( $_POST[ $key ] ) ? sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) ) : $default; }
function sd_core_safe_redirect( $url, $fallback = '' ) { $url = wp_validate_redirect( esc_url_raw( $url ), $fallback ?: home_url( '/' ) ); return $url ?: home_url( '/' ); }
function sd_core_form_nonce( $action ) { return isset( $_POST['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), $action ); }
