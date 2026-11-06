<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_homepage_registration_url() { return get_option( 'users_can_register' ) ? wp_registration_url() : ''; }
function sd_homepage_join_url() { return is_user_logged_in() ? sd_homepage_destination( '', '/discover/' ) : ( sd_homepage_registration_url() ?: wp_login_url() ); }
function sd_homepage_explore_url() { return sd_homepage_destination( '', '/communities/' ); }
function sd_homepage_destination( $preferred, $fallback = '/' ) { return $preferred ? $preferred : home_url( $fallback ); }
function sd_homepage_heading( $eyebrow, $title, $description = '' ) { ?><div class="sd-home-heading"><?php if ( $eyebrow ) : ?><span class="sd-eyebrow"><?php echo esc_html( $eyebrow ); ?></span><?php endif; ?><h2><?php echo esc_html( $title ); ?></h2><?php if ( $description ) : ?><p><?php echo esc_html( $description ); ?></p><?php endif; ?></div><?php }
function sd_homepage_grid_class( $columns ) { $columns = max( 1, min( 4, absint( $columns ) ) ); return 'sd-home-grid sd-home-grid-' . $columns; }
function sd_homepage_faq_items() { $raw = preg_split( '/\R/', (string) sd_homepage_get( 'sd_home_faq_items' ) ); $items = array(); for ( $i = 0; $i < count( $raw ); $i += 2 ) { if ( ! empty( $raw[ $i ] ) && isset( $raw[ $i + 1 ] ) ) { $items[] = array( 'question' => sanitize_text_field( $raw[ $i ] ), 'answer' => sanitize_textarea_field( $raw[ $i + 1 ] ) ); } } return $items; }
