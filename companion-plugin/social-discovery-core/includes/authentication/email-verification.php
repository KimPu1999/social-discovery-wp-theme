<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_buddypress_activation_active() { return function_exists( 'bp_is_active' ) && function_exists( 'bp_get_signup_allowed' ) && bp_get_signup_allowed(); }
function sd_core_verification_note() { return sd_core_buddypress_activation_active() ? __( 'If BuddyPress account activation is enabled, follow its activation email before continuing.', 'social-discovery-core' ) : __( 'Email verification is not enabled by this companion plugin. Configure BuddyPress activation or a site-approved verification system before requiring it.', 'social-discovery-core' ); }
