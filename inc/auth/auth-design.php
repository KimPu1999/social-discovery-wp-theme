<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_auth_body_class( $classes ) { if ( is_page_template( array( 'page-templates/login.php', 'page-templates/register.php', 'page-templates/forgot-password.php', 'page-templates/reset-password.php' ) ) ) { $classes[] = 'sd-auth-page'; } return $classes; }
add_filter( 'body_class', 'sd_auth_body_class' );
