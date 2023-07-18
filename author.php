<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();
?>

		<main class="main-content w-11/12 mx-auto mt-6">
		<div class="grid grid-cols-1 md:grid-cols-6 gap-12">
			
		<?php 
		
		get_template_part(
			'components/full-width-header'
		);
		
	// 	get_template_part( 'layouts/author-content', 'name', array(
	// 		'articles'   => $posts
	// )); ?>
	
	<?php
		while ( have_posts() ) :
			the_post();
		
			get_template_part( 'layouts/content' );


		endwhile; // End of the loop.
		?>
		

	</div>

	</main><!-- #main -->

<?php

get_footer();
