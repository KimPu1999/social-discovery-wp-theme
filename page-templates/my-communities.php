<?php
/** Template Name: My Communities */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! is_user_logged_in() ) { auth_redirect(); }
get_header(); ?><main id="primary" class="sd-main sd-community-page"><div class="sd-container"><header class="sd-page-heading"><span class="sd-eyebrow"><?php esc_html_e( 'Your spaces', 'social-discovery' ); ?></span><h1><?php esc_html_e( 'My communities', 'social-discovery' ); ?></h1><p><?php esc_html_e( 'Communities you participate in and manage.', 'social-discovery' ); ?></p></header><?php $data = sd_communities_template_data(); $data['result'] = sd_groups_query( array( 'user_id' => get_current_user_id(), 'per_page' => 24, 'page' => 1, 'show_hidden' => true, 'type' => 'active' ) ); get_template_part( 'template-parts/communities/directory', null, $data ); ?></div></main><?php get_footer();
