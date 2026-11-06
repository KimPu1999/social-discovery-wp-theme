<?php
/** Template Name: Messages */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! is_user_logged_in() ) { auth_redirect(); }
get_header(); ?><main id="primary" class="sd-main sd-messaging-page"><div class="sd-container"><?php get_template_part( 'template-parts/messaging/inbox' ); ?></div></main><?php get_footer();
