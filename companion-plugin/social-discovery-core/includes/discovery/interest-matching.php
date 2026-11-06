<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_shared_interest_count( $a, $b ) { $a = function_exists( 'sd_core_user_interests' ) ? sd_core_user_interests( $a ) : array(); $b = function_exists( 'sd_core_user_interests' ) ? sd_core_user_interests( $b ) : array(); return count( array_intersect( $a, $b ) ); }
