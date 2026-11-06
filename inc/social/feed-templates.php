<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_social_current_filter() { $filter = isset( $_GET['feed'] ) ? sanitize_key( wp_unslash( $_GET['feed'] ) ) : 'public'; return in_array( $filter, array( 'public', 'mine', 'friends', 'mentions' ), true ) ? $filter : 'public'; }
