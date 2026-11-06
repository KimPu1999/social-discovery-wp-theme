<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_activity_visible( $activity_id ) { if ( ! function_exists( 'bp_activity_get_specific' ) ) { return false; } $result = bp_activity_get_specific( array( 'activity_ids' => array( absint( $activity_id ) ), 'show_hidden' => false ) ); return ! empty( $result['activities'][0] ); }
