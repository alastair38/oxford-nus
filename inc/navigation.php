<?php
/**
 *  Main navigation adaptations
 *
 * @package blockhaus
 */

/**
 * Add search bar to main navigation
 */

// function add_searchbar_box( $items, $args )
// {
//     if($args->theme_location == 'menu-1')
//     {
//       $items .= '<li>' . blockhaus_custom_form('Search ...') . '</li>';
//     }

//     return $items;
// }

// add_filter( 'wp_nav_menu_items', 'add_searchbar_box', 10, 2);


/**
 * Add an Instagram link to the main navigation
 */
function add_searchbar( $items, $args ) {
		
    if($args->theme_location == 'menu-1')
    {
      
      $items .= '<li>' . blockhaus_custom_form() . '</li>';
       
    }

    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_searchbar', 10, 2);
