<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_audit_rows( $page = 1, $per_page = 20 ) { global $wpdb; $t = sd_core_table_names(); $per_page = min( 50, max( 1, absint( $per_page ) ) ); $offset = ( max( 1, absint( $page ) ) - 1 ) * $per_page; return $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$t['audit']} ORDER BY id DESC LIMIT %d OFFSET %d", $per_page, $offset ) ); }
