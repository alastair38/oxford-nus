<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();

$post_type_obj = get_post_type_object( $post_type );

if(function_exists('get_field')):

	$postTypeMeta = get_field($post_type . '_page_settings', "options");

endif;

?>

<main class="main-content w-11/12 max-w-screen-2xl mx-auto mt-6">
	
	<div class="grid grid-cols-1 md:grid-cols-6 2xl:grid-cols-12 gap-12">

		<?php 
				
		get_template_part('components/archive-header');
				
		if ( have_posts() ) :	
			/* Start the Loop */;
		while ( have_posts() ) :
			
			the_post();

			get_template_part( 'layouts/content');

		endwhile;
			
		// update to reflect post type in link text

		the_posts_navigation(['aria_label' => __( 'More content' ), 'class' => 'col-span-full']);

		else :

			get_template_part( 'layouts/empty' );

		endif;?>

	</div>

</main><!-- #main -->

<?php

get_footer();
