<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_register_group_category_taxonomy() {
	register_taxonomy( 'sd_group_category', 'bp_group', array( 'public' => true, 'show_ui' => true, 'show_in_rest' => false, 'label' => __( 'Community Categories', 'social-discovery-core' ), 'rewrite' => array( 'slug' => 'community-category' ) ) );
}
add_action( 'bp_init', 'sd_core_register_group_category_taxonomy', 20 );
