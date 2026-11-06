<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_dashboard_current_section() { return is_page_template( 'page-templates/notification-center.php' ) ? 'notifications' : ( is_page_template( 'page-templates/personal-workspace.php' ) ? 'workspace' : 'dashboard' ); }
