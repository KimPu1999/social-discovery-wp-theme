<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_core_register_exporter( $exporters ) { $exporters['social-discovery-core'] = array( 'exporter_friendly_name' => __( 'Social Discovery data', 'social-discovery-core' ), 'callback' => 'sd_core_export_personal_data' ); return $exporters; }
function sd_core_export_personal_data( $email_address, $page = 1 ) { $user = get_user_by( 'email', $email_address ); if ( ! $user ) { return array( 'data' => array(), 'done' => true ); } $data = array(); foreach ( sd_core_privacy_data_categories() as $key ) { $data[] = array( 'group_id' => 'social-discovery', 'group_label' => __( 'Social Discovery', 'social-discovery-core' ), 'item_id' => $key, 'data' => array( array( 'name' => $key, 'value' => get_user_meta( $user->ID, $key, true ) ) ) ); } return array( 'data' => $data, 'done' => true ); }
add_filter( 'wp_privacy_personal_data_exporters', 'sd_core_register_exporter' );
