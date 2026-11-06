<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_allowed_member_sort( $sort ) { return in_array( $sort, array( 'active', 'newest', 'alphabetical', 'random' ), true ) ? $sort : 'active'; }
