<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_maybe_migrate() { if ( get_option( 'sd_core_schema_version' ) !== '1.0.0' ) { sd_core_install_schema(); } }
add_action( 'admin_init', 'sd_core_maybe_migrate' );
