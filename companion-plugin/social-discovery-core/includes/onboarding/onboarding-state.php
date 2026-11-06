<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_onboarding_step( $user_id = 0 ) { $user_id = $user_id ?: get_current_user_id(); return max( 1, min( 6, absint( get_user_meta( $user_id, 'sd_onboarding_step', true ) ?: 1 ) ) ); }
function sd_core_onboarding_complete( $user_id = 0 ) { $user_id = $user_id ?: get_current_user_id(); return '1' === (string) get_user_meta( $user_id, 'sd_onboarding_complete', true ); }
function sd_core_save_onboarding_step( $user_id, $step ) { update_user_meta( $user_id, 'sd_onboarding_step', max( 1, min( 6, absint( $step ) ) ) ); }
