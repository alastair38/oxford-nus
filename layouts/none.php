<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<section class="no-results col-span-full not-found space-y-6">
	
	<header class="page-header">
		
		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'blockhaus' ); ?></h2>
		
	</header><!-- .page-header -->

	<div class="page-content space-y-6">
		
		<?php
		if ( is_search() ) :?>

			<p>
				<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blockhaus' ); ?>
			</p>
			
			<?php echo blockhaus_custom_form();

		else :?>

			<p>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'blockhaus' ); ?>
			</p>
			
			<?php echo blockhaus_custom_form();

		endif;?>
		
	</div><!-- .page-content -->
	
</section><!-- .no-results -->
