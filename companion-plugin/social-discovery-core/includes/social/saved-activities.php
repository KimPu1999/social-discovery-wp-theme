<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_saved_activity_ids( $user_id = 0 ) { $ids = get_user_meta( $user_id ?: get_current_user_id(), 'sd_saved_activity_ids', true ); return is_array( $ids ) ? array_values( array_filter( array_map( 'absint', $ids ) ) ) : array(); }
function sd_core_saved_activity( $user_id, $activity_id, $save = true ) { $ids = sd_core_saved_activity_ids( $user_id ); $activity_id = absint( $activity_id ); if ( $save && ! in_array( $activity_id, $ids, true ) ) { $ids[] = $activity_id; } if ( ! $save ) { $ids = array_values( array_diff( $ids, array( $activity_id ) ) ); } update_user_meta( $user_id, 'sd_saved_activity_ids', array_slice( $ids, 0, 500 ) ); return $ids; }
