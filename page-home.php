<?php
/**
 * * Template Name: Home Page Template
 *
 * @package blockhaus
 */

get_header();
?>

<main id="primary" class="main-content w-11/12 max-w-screen-2xl mx-auto mt-6">

	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'layouts/home' );

		endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php

get_footer();
