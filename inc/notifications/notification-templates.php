<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_notification_bell() { if ( ! is_user_logged_in() || ! sd_notifications_available() ) { return; } $count = sd_notification_unread_count(); echo '<a class="sd-icon-button sd-notification-bell" href="' . esc_url( sd_home_url( 'notifications' ) ) . '" aria-label="' . esc_attr__( 'Notifications', 'social-discovery' ) . '">♧' . ( $count ? '<span class="sd-notification-count">' . esc_html( $count ) . '</span>' : '' ) . '</a>'; }
function sd_notification_global_bell() { if ( is_user_logged_in() && sd_notifications_available() ) { echo '<div class="sd-notification-global-bell">'; sd_notification_bell(); echo '</div>'; } }
add_action( 'wp_body_open', 'sd_notification_global_bell' );
