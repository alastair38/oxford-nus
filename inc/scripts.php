<?php
/**
 * Enqueue site CSS and JS scripts
 *
 *
 * @package blockhaus
 */

function blockhaus_scripts() {
	wp_enqueue_style( 'blockhaus-style', get_template_directory_uri() . '/styles/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_style_add_data( 'blockhaus-style', 'rtl', 'replace' );

	wp_enqueue_script( 'blockhaus-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), wp_get_theme()->get( 'Version' ), true );
	
	if(is_singular('output' )):
		wp_enqueue_script( 'blockhaus-citation', get_template_directory_uri() . '/assets/js/citation.js', array(), wp_get_theme()->get( 'Version' ), true );	
	endif;



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blockhaus_scripts' );

// Block variations js

function block_variations() {
	wp_enqueue_script(
	'prefix-block-variations',
	get_template_directory_uri() . '/assets/js/block-variations.js',
	array( 'wp-blocks')
	);
	}
	add_action( 'enqueue_block_editor_assets', 'block_variations' );

	function custom_admin_css() {
  
		wp_enqueue_style( 'admin_styles', get_template_directory_uri() . '/styles/admin.css',true,'1.1','all', wp_get_theme()->get( 'Version' ));
	}
add_action('admin_footer', 'custom_admin_css');

// Ajax comments

add_action( 'wp_enqueue_scripts', 'blockhaus_ajax_comments_scripts' );

function blockhaus_ajax_comments_scripts() {
 
	// // I think jQuery is already included in your theme, check it yourself
	// wp_enqueue_script('jquery');
 
	// just register for now, we will enqueue it below
	wp_register_script( 'ajax_comment', get_stylesheet_directory_uri() . '/assets/js/ajax-comment.js', array('jquery') );
 
	// let's pass ajaxurl here, you can do it directly in JavaScript but sometimes it can cause problems, so better is PHP
	wp_localize_script( 'ajax_comment', 'misha_ajax_comment_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
	) );
	
	if ( is_singular() && comments_open() ) {
 		wp_enqueue_script( 'ajax_comment' );
	}
}
