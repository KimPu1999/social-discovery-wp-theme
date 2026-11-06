<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_rate_key( $action ) { $ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown'; return 'sd_rate_' . md5( $action . '|' . $ip ); }
function sd_core_rate_limited( $action, $limit = 5, $window = HOUR_IN_SECONDS ) { $key = sd_core_rate_key( $action ); $count = absint( get_transient( $key ) ); if ( $count >= $limit ) { return true; } set_transient( $key, $count + 1, $window ); return false; }
