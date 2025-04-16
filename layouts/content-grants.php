<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

if(function_exists('get_field')):
		
	$grantFunder = get_field('grant_funder');
	$projects_list = get_field('grant_projects');
	$people_list = get_field('grant_people');
	
endif;
?>

<article id="post-<?php the_ID(); ?>" class="flex flex-col pb-6 space-y-3 md:space-y-6 border-b">

	<header class="entry-header space-y-3">
		
		<?php the_title( '<h2 class="text-default font-bold md:leading-tight">', '</h2>' );?>
			
	</header><!-- .entry-header -->
	
	<div class="entry-content">
			
		<?php the_excerpt(); ?>
			
	</div><!-- .entry-content -->
		
	<div class="entry-meta bg-neutral-light-100 p-4 rounded-md flex flex-col gap-6 text-sm">
				
	<?php
				
	if(! empty($grantFunder)):?>
					
		<div class="text-neutral-dark-500">
			
			<?php blockhaus_funders($grantFunder, 'Funder(s)');?>
					
		</div>
				
		<?php wp_reset_postdata(); endif;
			
		if(! empty($projects_list)):?>
					
		<div class="text-neutral-dark-500">
			
		<?php blockhaus_projects($projects_list, 'Project(s)');?>
			
		</div>
				
		<?php endif;
				
		if(! empty($people_list)):?>
					
		<div class="text-neutral-dark-500">
			
		<?php blockhaus_people($people_list, 'People');?>
						
		</div>
				
	<?php endif; ?>
				
	</div><!-- .entry-meta -->

	<footer class="entry-footer mt-auto">

			<?php get_template_part('components/permalink'); ?>
				
	</footer><!-- .entry-footer -->
	
</article><!-- #post-... -->
