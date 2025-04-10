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


add_filter( 'wpc_filter_post_meta_term_name', 'wpc_custom_term_name', 10, 2 );
function wpc_custom_term_name( $term_name, $products_name ){
    if( $products_name === 'associated_projects' || $products_name === 'associated_grants' || $products_name === 'associated_people' || $products_name === 'grant_projects' || $products_name === 'grant_people' || $products_name === 'grant_funder'){
        $term_name = get_the_title( $term_name );
    } else {
			
		}

    return $term_name;
}

class Blockhaus_Menu_Walker extends Walker_Nav_Menu {
	
	function start_lvl(&$output, $depth = 1, $args = array()) {
		
		
		
		if ($args->walker->has_children) {
			$output .= '<ul class="sub-menu grid grid-cols-1 gap-x-6 gap-y-3 shadow-lg border absolute top-full mt-1 rounded-md p-3 bg-white w-max right-0 hidden">';
		}
}

	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='flex relative items-center" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<button aria-controls="' . $item->classes[0] . '" class="text-sm hover:text-neutral-dark-100 focus-visible:text-neutral-dark-100" aria-expanded="false">';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</button>';
		}
		
		if ($args->walker->has_children) {
			$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m10 16l4-4l-4-4" />
</svg>';
		}
		
		
	}
	
	
}