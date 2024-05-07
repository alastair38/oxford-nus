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

$postTypeMeta = get_field($post_type . '_page_settings', "options");
?>

		<main class="main-content w-11/12 max-w-screen-2xl mx-auto mt-6 space-y-8 md:space-y-12">
			
		<?php get_template_part('components/archive-header-alt'); ?>
			
		<div class="grid grid-cols-1 gap-8 md:gap-12 w-full md:w-3/4 mx-auto">

			<?php 
				
				if ( have_posts() ) :	
			/* Start the Loop */;
			while ( have_posts() ) :
				the_post();

				get_template_part( 'layouts/content-alt');

			endwhile;
			
			// update to reflect post type in link text

			the_posts_navigation(['aria_label' => __( 'Outputs navigation' ), 'prev_text' => __( 'Older Outputs' ),  'next_text' => __( 'Newer Outputs' ), 'class' => 'col-span-full']);

		else :

			get_template_part( 'layouts/empty' );

		endif;
		?>

	</div>

	</main><!-- #main -->

<?php

get_footer();
