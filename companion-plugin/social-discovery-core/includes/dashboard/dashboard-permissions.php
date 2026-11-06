<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_dashboard_owner( $user_id = 0 ) { return is_user_logged_in() && ( ! $user_id || absint( $user_id ) === get_current_user_id() ); }
