<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_report_button( $type, $id ) { if ( ! is_user_logged_in() || ! function_exists( 'sd_core_create_report' ) ) { return; } echo '<button class="sd-report-button" type="button" data-sd-report-type="' . esc_attr( $type ) . '" data-sd-report-id="' . esc_attr( $id ) . '">' . esc_html__( 'Report', 'social-discovery' ) . '</button>'; }
function sd_render_report_modal() { if ( is_user_logged_in() && function_exists( 'sd_core_create_report' ) ) { get_template_part( 'template-parts/moderation/report-modal' ); } }
add_action( 'wp_footer', 'sd_render_report_modal' );
