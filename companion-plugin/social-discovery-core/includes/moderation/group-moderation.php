<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_can_moderate_group( $group_id ) { return sd_core_can_moderate( 'sd_moderate_groups' ) || ( function_exists( 'groups_is_user_admin' ) && groups_is_user_admin( get_current_user_id(), absint( $group_id ) ) ) || ( function_exists( 'groups_is_user_mod' ) && groups_is_user_mod( get_current_user_id(), absint( $group_id ) ) ); }
