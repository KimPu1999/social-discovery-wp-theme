<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_render_avatar( $user_id = 0, $size = 64, $label = '' ) { $alt = $label ? $label : __( 'Member avatar', 'social-discovery' ); printf( '<img class="sd-avatar" src="%1$s" width="%2$d" height="%2$d" alt="%3$s" loading="lazy">', esc_url( sd_avatar( $user_id, $size ) ), absint( $size ), esc_attr( $alt ) ); }
function sd_user_name( $user_id ) { $name = get_the_author_meta( 'display_name', $user_id ); if ( function_exists( 'bp_core_get_user_displayname' ) ) { $name = bp_core_get_user_displayname( $user_id ); } return $name ? $name : __( 'Member', 'social-discovery' ); }
function sd_get_member_url( $user_id ) { if ( function_exists( 'bp_core_get_user_domain' ) ) { return bp_core_get_user_domain( $user_id ); } return get_author_posts_url( $user_id ); }
function sd_render_empty( $title, $message ) { echo '<div class="sd-card sd-empty"><h3>' . esc_html( $title ) . '</h3><p>' . esc_html( $message ) . '</p></div>'; }
function sd_get_page_url( $slug, $fallback = '/' ) { $page = get_page_by_path( $slug ); return $page ? get_permalink( $page ) : home_url( $fallback ); }
