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

		<?php the_title(sprintf( '<h2 class="has-large-font-size">', '%s' ), '</h2>');?>

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
	
	
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
