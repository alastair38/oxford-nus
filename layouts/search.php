<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="space-y-6 p-6">
	<header class="entry-header">

		<?php the_title(sprintf( '<h2 class="has-large-font-size">', '%s' ), '</h2>');
 		?>

		<div class="entry-meta text-sm flex gap-2">
		
			<?php blockhaus_posted_on(); ?>

		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->
<hr>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer flex items-center justify-between">

	<?php get_template_part('components/permalink'); ?>
	
	<!-- <span aria-label="Content type: <?php 'post' !== get_post_type() ? print(get_post_type()) : print('News and Events');?>" class="post-type inline-flex gap-2 items-center"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="currentColor" d="M18 11h8v2h-8zM6 19h8v2H6zm4-3a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4zm0-6a2 2 0 1 0 2 2a2.002 2.002 0 0 0-2-2zm12 14a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4zm0-6a2 2 0 1 0 2 2a2.002 2.002 0 0 0-2-2z"/><path fill="currentColor" d="M28 30H4a2.002 2.002 0 0 1-2-2V4a2.002 2.002 0 0 1 2-2h24a2.002 2.002 0 0 1 2 2v24a2.002 2.002 0 0 1-2 2ZM4 4v24h24V4Z"/></svg><?php 'post' !== get_post_type() ? print(get_post_type()) : print('News');?></span> -->
		
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
