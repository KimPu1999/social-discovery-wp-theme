<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_enqueue_assets() { wp_enqueue_style( 'sd-style', get_stylesheet_uri(), array(), SD_VERSION ); foreach ( array( 'design-system', 'typography', 'layout', 'header', 'footer', 'components', 'responsive' ) as $style ) { wp_enqueue_style( 'sd-' . $style, SD_URI . '/assets/css/' . $style . '.css', array( 'sd-style' ), SD_VERSION ); } foreach ( array( 'navigation', 'sticky-header', 'theme-mode' ) as $script ) { wp_enqueue_script( 'sd-' . $script, SD_URI . '/assets/js/' . $script . '.js', array(), SD_VERSION, true ); } wp_localize_script( 'sd-theme-mode', 'sdTheme', array( 'mode' => sd_get_option( 'sd_dark_mode', 'system' ) ) ); }
add_action( 'wp_enqueue_scripts', 'sd_enqueue_assets' );
