<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_social_current_sort() { $sort = isset( $_GET['sort'] ) ? sanitize_key( wp_unslash( $_GET['sort'] ) ) : sd_get_option( 'sd_social_default_sort', 'active' ); return in_array( $sort, array( 'active', 'newest', 'alphabetical', 'random' ), true ) ? $sort : 'active'; }
