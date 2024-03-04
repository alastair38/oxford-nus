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
			
			<div class="entry-meta flex gap-6 itaic flex-wrap text-sm pt-2">
				
				<?php
				
				$terms_year = get_the_terms(get_the_ID(), 'pub_year');
				
				if(! empty($terms_year)):?>
					
					<div class="flex gap-1 items-center text-neutral-dark-500">
						<span class="sr-only">Year</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"><path fill="currentColor" d="M18.435 4.955h-1.94v-1.41c0-.26-.23-.51-.5-.5c-.27.01-.5.22-.5.5v1.41h-7v-1.41c0-.26-.23-.51-.5-.5c-.27.01-.5.22-.5.5v1.41h-1.93a2.5 2.5 0 0 0-2.5 2.5v11a2.5 2.5 0 0 0 2.5 2.5h12.87a2.5 2.5 0 0 0 2.5-2.5v-11a2.5 2.5 0 0 0-2.5-2.5m1.5 13.5c0 .83-.67 1.5-1.5 1.5H5.565c-.83 0-1.5-.67-1.5-1.5v-8.42h15.87zm0-9.42H4.065v-1.58c0-.83.67-1.5 1.5-1.5h1.93v.59c0 .26.23.51.5.5c.27-.01.5-.22.5-.5v-.59h7v.59c0 .26.23.51.5.5c.27-.01.5-.22.5-.5v-.59h1.94c.83 0 1.5.67 1.5 1.5z"/><path fill="currentColor" d="M11.492 17.173v-3.46a.075.075 0 0 0-.114-.064l-.638.392a.15.15 0 0 1-.228-.128v-.651c0-.105.055-.203.146-.257l.764-.457a.3.3 0 0 1 .154-.043h.626a.3.3 0 0 1 .3.3v4.367a.3.3 0 0 1-.3.3h-.409a.298.298 0 0 1-.301-.299"/></svg>
					
					<?php foreach($terms_year as $term):
						
						echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
						
					endforeach;?>
					
					</div>
				
				<?php endif;
				
				$terms_type = get_the_terms(get_the_ID(), 'assigned-project');
				
				if(! empty($terms_type)):?>
					
					<div class="flex gap-1 items-center text-neutral-dark-500">
						<span class="sr-only">Type</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" transform="translate(1 3)"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M11.914.5H15.5a2 2 0 0 1 2 2v3.586a1 1 0 0 1-.293.707l-6.793 6.793a2 2 0 0 1-2.828 0l-3.172-3.172a2 2 0 0 1 0-2.828L11.207.793A1 1 0 0 1 11.914.5"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m7.5 13.5l-2.013 1.006A2 2 0 0 1 2.72 13.42L1.105 9.114a2 2 0 0 1 .901-2.45L9.5 2.5"/><rect width="2" height="2" x="14" y="2" fill="currentColor" rx="1"/></g></svg>
					
					<?php foreach($terms_type as $term):
						
						echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
						
					endforeach;?>
					
					</div>
				
				<?php endif;

					// blockhaus_posted_by($post);

					// blockhaus_posted_on();

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
