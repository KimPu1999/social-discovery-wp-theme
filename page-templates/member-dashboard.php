<?php
/** Template Name: Member Dashboard */
if ( ! defined( 'ABSPATH' ) ) { exit; }
sd_dashboard_require_login(); get_header(); ?><main id="primary" class="sd-main sd-dashboard-page"><div class="sd-container"><?php get_template_part( 'template-parts/dashboard/dashboard-layout' ); ?></div></main><?php get_footer();
