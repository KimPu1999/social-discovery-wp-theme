<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_can_edit_user( $user_id ) { return current_user_can( 'edit_user', $user_id ) || ( get_current_user_id() === absint( $user_id ) ); }
function sd_core_current_user_required() { if ( ! is_user_logged_in() ) { wp_safe_redirect( wp_login_url() ); exit; } return get_current_user_id(); }
