<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function sd_communities_template_data() {
	$search = isset( $_GET['community_search'] ) ? sanitize_text_field( wp_unslash( $_GET['community_search'] ) ) : '';
	$type = isset( $_GET['community_sort'] ) ? sanitize_key( $_GET['community_sort'] ) : 'active';
	$allowed = array( 'active', 'newest', 'popular', 'alphabetical' );
	if ( ! in_array( $type, $allowed, true ) ) { $type = 'active'; }
	$args = array( 'type' => $type );
	if ( $search ) { $args['search_terms'] = $search; }
	if ( 'mine' === $type && is_user_logged_in() ) { $args['user_id'] = get_current_user_id(); $args['type'] = 'active'; }
	$args['page'] = isset( $_GET['paged'] ) ? max( 1, absint( $_GET['paged'] ) ) : 1;
	$args['per_page'] = 12;
	return array( 'search' => $search, 'sort' => $type, 'result' => sd_groups_query( $args ) );
}
