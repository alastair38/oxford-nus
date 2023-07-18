<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<section class="no-results col-span-3 flex flex-col items-center justify-center not-found space-y-6">
	<header class="page-header sr-only">
		<h1 class="page-title text-xl md:text-huge leading-none font-black font-sans "><?php esc_html_e( 'Nothing Found', 'blockhaus' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content space-y-6 text-center py-12">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'blockhaus' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		else :
			?>

			<p><?php esc_html_e( 'No content has been published in this section yet.', 'blockhaus' ); ?></p>
			<p><?php 
			
			$referer = $_SERVER['HTTP_REFERER'] ?? null;
			
			if($referer):
				
				echo '<a class="rounded-full px-3 py-1 bg-primary focus:no-underline hover:no-underline hover:ring-2 hover:ring-offset-2 hover:ring-primary focus:ring-2 focus:ring-offset-2 focus:ring-primary" href="' . $referer . '">' . esc_html( 'Go back to previous page', 'blockhaus' ) . '</a>' ;

			endif;

			?></p>
			

		<?php endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
