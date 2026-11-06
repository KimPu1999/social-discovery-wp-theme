<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_can_manage_block( $user_id, $target_id ) { return is_user_logged_in() && absint( $user_id ) === get_current_user_id() && absint( $target_id ) !== get_current_user_id(); }
