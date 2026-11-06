<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_notifications_available() { return function_exists( 'bp_is_active' ) && bp_is_active( 'notifications' ); }
