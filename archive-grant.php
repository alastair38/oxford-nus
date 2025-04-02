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
			
		<?php get_template_part('components/archive-header-search'); ?>
			
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 w-full mdw-3/4 mx-auto">
			
		<div class="md:p-6 px-3 pt-6 md:shadow-md bg-white border rounded-md text-sm h-fit">
			
		<?php echo do_shortcode( '[fe_widget]' ); ?>
	
		</div>
		
		<div class="lg:col-span-2 space-y-6">

			<?php 
				
				if ( have_posts() ) :	
			/* Start the Loop */;
			while ( have_posts() ) :
				the_post();

				get_template_part( 'layouts/content-grants');

			endwhile;
			
			// update to reflect post type in link text

			the_posts_navigation(['aria_label' => __( 'Outputs navigation' ), 'prev_text' => __( 'Older Outputs' ),  'next_text' => __( 'Newer Outputs' ), 'class' => 'col-span-full']);

		else :

			get_template_part( 'layouts/empty' );

		endif;
		?>
</div>
	</div>

	</main><!-- #main -->

<?php

get_footer();
