<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_blocking_allowed( $target_id ) { return ! sd_core_is_blocked( get_current_user_id(), absint( $target_id ) ) && ! sd_core_is_blocked( absint( $target_id ), get_current_user_id() ); }
