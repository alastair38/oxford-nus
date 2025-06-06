<?php
/**
 * * Template Name: Full Width Page
 *
 * @package blockhaus
 */

get_header();
?>

<main id="primary" class="main-content w-11/12 mx-auto mt-12">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'layouts/page-wide' );

		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php

get_footer();
