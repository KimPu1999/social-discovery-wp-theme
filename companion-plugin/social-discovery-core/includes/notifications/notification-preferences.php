<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_notification_preferences( $user_id = 0 ) { return get_user_meta( $user_id ? absint( $user_id ) : get_current_user_id(), 'sd_notification_preferences', true ); }
