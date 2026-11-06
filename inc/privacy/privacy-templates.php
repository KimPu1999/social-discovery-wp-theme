<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_privacy_guidelines_url() { $page = get_page_by_path( 'community-guidelines' ); return $page ? get_permalink( $page ) : home_url( '/' ); }
