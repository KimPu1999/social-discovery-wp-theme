<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?><!doctype html>
<html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#2563eb"><?php wp_head(); ?></head>
<body <?php body_class(); ?> data-theme-mode="<?php echo esc_attr( sd_get_option( 'sd_dark_mode' ) ); ?>">
<?php wp_body_open(); ?><a class="sd-skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'social-discovery' ); ?></a>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { $layout = sd_get_option( 'sd_header_layout' ); get_template_part( 'template-parts/header/header', in_array( $layout, array( 'centered', 'minimal' ), true ) ? $layout : 'default' ); } ?>
