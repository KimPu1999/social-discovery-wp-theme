<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_onboarding_current_step() { return function_exists( 'sd_core_onboarding_step' ) ? sd_core_onboarding_step() : 1; }
