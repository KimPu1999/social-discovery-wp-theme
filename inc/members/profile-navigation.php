<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_member_profile_allowed( $user_id ) { return function_exists( 'sd_core_can_view_profile' ) ? sd_core_can_view_profile( $user_id ) : ( is_user_logged_in() || get_current_user_id() === $user_id ); }
