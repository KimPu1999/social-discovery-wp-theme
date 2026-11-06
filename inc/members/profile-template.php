<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_members_get_user() { $user_id = isset( $_GET['user_id'] ) ? absint( $_GET['user_id'] ) : get_current_user_id(); return $user_id ? get_user_by( 'id', $user_id ) : false; }
