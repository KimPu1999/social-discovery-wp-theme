<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_auth_url( $slug, $fallback = '/' ) { $page = get_page_by_path( $slug ); return $page ? get_permalink( $page ) : home_url( $fallback ); }
function sd_auth_account_url() { return sd_auth_url( 'account-settings', '/account-settings/' ); }
function sd_auth_profile_url() { return sd_auth_url( 'member-profile', '/profile/' ); }
function sd_auth_logout_url() { return wp_logout_url( home_url( '/' ) ); }
