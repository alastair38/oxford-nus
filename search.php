<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package blockhaus
 */

get_header();?>

	
			
		<?php 
		if(get_query_var( 'post_types' ) === 'output'):?>
		
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
		
		<?php else:?>
	
	<main id="primary" class="main-content w-11/12 space-y-12 mx-auto mt-12">

	<div class="grid grid-cols-1 md:grid-cols-6 2xl:grid-cols-12 gap-12">
		
		<?php get_template_part('components/search-header'); ?>
			
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'layouts/content' );
				

			endwhile;

			the_posts_navigation(array('class' => 'col-span-full'));

		else :

			get_template_part( 'layouts/none' );

		endif;
		?>

	</div>
	
	</main><!-- #main -->
	
	<?php endif;?>

<?php
get_footer();
