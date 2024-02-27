<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */


 
?>

<article id="post-<?php the_ID(); ?>" class="flex flex-col space-y-6 break-words relative col-span-2 2xl:col-span-3">

	<?php 
	if(has_post_thumbnail()):
	blockhaus_post_thumbnail('blog'); 
	endif;
	?>

	<div class="space-y-6">
		
		<header class="entry-header">
			<?php
			
			the_title( '<h2 class="text-lg font-bold leading-tight">', '</h2>' );

			?>
			
			
				
				<?php	
					
				if ( 'post' === get_post_type() ) :?>

				<div class="entry-meta flex gap-x-6 flex-wrap text-sm italic justify-between py-1">
	
				<?php	blockhaus_posted_by($post);

					blockhaus_posted_on();?>
					
				</div><!-- .entry-meta -->

				<?php endif; ?>
				
			
		
		</header><!-- .entry-header -->
		
	
		<div class="entry-content">
			
			
			<?php

			if(('page' !== get_post_type()) ):


				echo wp_trim_words( get_the_content(), 40, '...' );

			endif;
			?>
			
		</div><!-- .entry-content -->

		<footer class="entry-footer mt-auto">

			<?php get_template_part('components/permalink'); ?>
				
		</footer><!-- .entry-footer -->
	
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
