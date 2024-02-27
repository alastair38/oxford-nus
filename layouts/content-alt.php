<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */


 
?>

<article id="post-<?php the_ID(); ?>" class="flex flex-col pb-6 space-y-3 md:space-y-6 border-b">

		
		<header class="entry-header">
			<?php
			
			the_title( '<h2 class="text-default font-bold md:leading-tight">', '</h2>' );

			?>
			
			<div class="entry-meta flex gap-x-6 flex-wrap text-sm italic justify-between py-1">
				
				<?php		

					// blockhaus_posted_by($post);

					blockhaus_posted_on();

				?>
				
			</div><!-- .entry-meta -->
		
		</header><!-- .entry-header -->
		
	
		<div class="entry-content">
			
			
			<?php

			the_content();

			?>
			
		</div><!-- .entry-content -->

		<footer class="entry-footer mt-auto">

			<?php get_template_part('components/permalink'); ?>
				
		</footer><!-- .entry-footer -->
	
	
</article><!-- #post-<?php the_ID(); ?> -->
