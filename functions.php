<?php
/**
 * blockhaus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blockhaus
 */

if ( ! defined( 'BLOCKHAUS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BLOCKHAUS_VERSION', '1.0.0' );
}

/**
 * Initial theme setup
 */

require get_template_directory() . '/inc/theme-setup.php';


/**
 * Enqueue scripts and styles.
 */

require get_template_directory() . '/inc/scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add public custom post types to main search query
 */

require get_template_directory() . '/inc/search.php';

/**
 * Add customized main navigation
 */

require get_template_directory() . '/inc/navigation.php';

/**
 * SEO
 */
require get_template_directory() . '/inc/seo.php';

/**
 * LOGIN
 */
require get_template_directory() . '/inc/login.php';

/**
 * ADMIN
 */
require get_template_directory() . '/inc/admin.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
	$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
	$title = single_tag_title( '', false );
	} elseif (is_tax()) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
	$title = get_the_author();
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
}
	
	return $title;
 });
 

	add_filter('months_dropdown_results', '__return_empty_array');

 
 

// Adapted from https://rudrastyh.com/wordpress/filter-posts-by-terms.html


add_action( 'restrict_manage_posts', 'grant_taxonomy_filter_multi' );

function grant_taxonomy_filter_multi( $post_type ){
	
	// let's decide about post type first
	if( 'grant' !== $post_type ){
		return;
	}
	// pass multiple taxonomies as an array of their slugs
	$taxonomies = array( 'grant-project', 'grant-people' );
	
	// for every taxonomy we are going to do the same
	foreach( $taxonomies as $taxonomy ){
		
		$taxonomy_object = get_taxonomy( $taxonomy );
		$selected = isset( $_GET[ $taxonomy ] ) ? $_GET[ $taxonomy ] : '';
		
		wp_dropdown_categories( 
			array(
				'show_option_all' =>  $taxonomy_object->labels->all_items,
				'taxonomy'        =>  $taxonomy,
				'name'            =>  $taxonomy,
				'orderby'         =>  'name', // slug / count / term_order etc
				'value_field'     =>  'slug',
				'selected'        =>  $selected,
				'hierarchical'    =>  true,
			)
		);
	}
}

add_action( 'restrict_manage_posts', 'project_taxonomy_filter_multi' );

function project_taxonomy_filter_multi( $post_type ){
	
	// let's decide about post type first
	if( 'project' !== $post_type ){
		return;
	}
	// pass multiple taxonomies as an array of their slugs
	$taxonomies = array( 'label');
	
	// for every taxonomy we are going to do the same
	foreach( $taxonomies as $taxonomy ){
		
		$taxonomy_object = get_taxonomy( $taxonomy );
		$selected = isset( $_GET[ $taxonomy ] ) ? $_GET[ $taxonomy ] : '';
		
		wp_dropdown_categories( 
			array(
				'show_option_all' =>  $taxonomy_object->labels->all_items,
				'taxonomy'        =>  $taxonomy,
				'name'            =>  $taxonomy,
				'orderby'         =>  'name', // slug / count / term_order etc
				'value_field'     =>  'slug',
				'selected'        =>  $selected,
				'hierarchical'    =>  true,
			)
		);
	}
}

/*
 * Add columns to project post list
 */
function add_acf_columns ( $columns ) {
	return array_merge ( $columns, array ( 
		'members' => __ ( 'Project Leads' ),
		'assoc_members' => __ ( 'Associated Personnel' ),
		'collab_members' => __ ( 'Collaborators' ),
	
	) );
}
add_filter ( 'manage_project_posts_columns', 'add_acf_columns' );

/*
 * Add columns to project post list
 */
function project_custom_column ( $column, $post_id ) {
	switch ( $column ) {
		case 'members':
			$members = get_post_meta ( $post_id, 'members_people', true );
			
			//var_dump($members);
		
			if(! empty($members)):
			foreach($members as $member) {
				echo get_the_title($member) . '<br/>';
			}
		endif;
			break;
		case 'assoc_members':
				$members = get_post_meta ( $post_id, 'assoc_members_people', true );
			
				if(! empty($members)):
				foreach($members as $member) {
					echo get_the_title($member) . '<br/>';
				}
			endif;
			break;
		case 'collab_members':
				$members = get_post_meta ( $post_id, 'collab_members_people', true );
			
				if(! empty($members)):
				foreach($members as $member) {
					echo get_the_title($member) . '<br/>';
				}
			endif;
			break;
	
	}
}
add_action ( 'manage_project_posts_custom_column', 'project_custom_column', 10, 2 );