<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_recommendation_reason( $count ) { return sprintf( _n( '%d shared interest', '%d shared interests', $count, 'social-discovery-core' ), absint( $count ) ); }
