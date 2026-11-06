<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_elementor_is_active() { return did_action( 'elementor/loaded' ) > 0; }
function sd_elementor_is_pro_active() { return defined( 'ELEMENTOR_PRO_VERSION' ); }
