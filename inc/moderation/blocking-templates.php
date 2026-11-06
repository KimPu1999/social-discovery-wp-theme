<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_block_button( $user_id ) { if ( ! is_user_logged_in() || get_current_user_id() === absint( $user_id ) || ! function_exists( 'sd_core_block_user' ) ) { return; } echo '<button class="sd-block-button" type="button" data-sd-block-user="' . esc_attr( $user_id ) . '">' . esc_html__( 'Block member', 'social-discovery' ) . '</button>'; }
