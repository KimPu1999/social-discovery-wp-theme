<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_page_url( $slug, $fallback = '/' ) { $page = get_page_by_path( $slug ); return $page ? get_permalink( $page ) : home_url( $fallback ); }
function sd_core_auth_redirect( $code, $url = '' ) { $target = sd_core_safe_redirect( $url, sd_core_page_url( 'login', '/' ) ); wp_safe_redirect( add_query_arg( 'sd_auth', sanitize_key( $code ), $target ) ); exit; }
