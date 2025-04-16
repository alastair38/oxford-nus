<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 if(function_exists('get_field')):
				
	$pub_year = get_field('published_year');				
	$projects_list = get_field('associated_projects');
	$people_list = get_field('associated_people');
	$grants_list = get_field('associated_grants');
	
endif;

?>

<article id="post-<?php the_ID(); ?>" class="flex flex-col pb-6 space-y-3 md:space-y-6 border-b">

	<header class="entry-header space-y-6">

		<?php the_title( '<h2 class="text-default font-bold md:leading-tight">', '</h2>' );?>

	</header><!-- .entry-header -->
	
	<div class="entry-content">
			
			<?php the_content(); ?>
				
	</div><!-- .entry-content -->
	
	<div class="entry-meta p-4 rounded-md flex flex-col bg-neutral-light-100 gap-6 flex-wrap text-sm">
				
		<?php
				
		if(! empty($people_list)):?>
					
		<div class="text-neutral-dark-900">
					
			<?php blockhaus_people($people_list, 'People');?>
					
		</div>
				
		<?php endif;
				
		if(! empty($projects_list)):?>
					
		<div class="inline text-neutral-dark-900">
					
			<?php blockhaus_projects($projects_list, 'Project(s)');?>
					
		</div>
				
		<?php endif; 
				
		if(! empty($grants_list)):?>
						
		<div class="inline text-neutral-dark-900">
					
			<?php blockhaus_grants($grants_list, 'Grant(s)');?>
				
		</div>
					
		<?php endif;
					
		if(! empty($pub_year)):?>
					
		<div class="gap-3 flex flex-col text-neutral-dark-900">
					
			<span class="text-sm font-black flex border-b border-neutral-light-900">
					<?php esc_html_e( 'Published year', 'blockhaus' );?>
			</span>

			<span><?php echo $pub_year;?></span>
					
		</div>
				
		<?php endif;?>
				
	</div><!-- .entry-meta -->
	
	<footer class="entry-footer mt-auto">

		<?php get_template_part('components/permalink'); ?>
				
	</footer><!-- .entry-footer -->
	
</article><!-- #post-... -->
