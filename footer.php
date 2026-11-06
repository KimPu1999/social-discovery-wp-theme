<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { $layout = sd_get_option( 'sd_footer_layout' ); get_template_part( 'template-parts/footer/footer', in_array( $layout, array( 'centered', 'minimal' ), true ) ? $layout : 'default' ); } ?>
<?php wp_footer(); ?></body></html>
