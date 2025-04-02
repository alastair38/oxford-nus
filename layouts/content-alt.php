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

		
		<header class="entry-header space-y-6">
		
		
			<?php
			
			the_title( '<h2 class="text-default font-bold md:leading-tight">', '</h2>' );

			?>
			
			<div class="entry-meta p-4 rounded-md flex flex-col bg-neutral-light-100 space-y-3 itaic flex-wrap text-sm">
				
				<?php
				
				$pub_year = get_field('published_year');				
				$projects_list = get_field('associated_projects');
				$people_list = get_field('associated_people');
				
				if(! empty($people_list)):?>
					
					<div class="inline-flex text-neutral-dark-900">
						<span class="sronly font-bold">People:</span>
					
					<div class="divide-x inline gap-1 flex-wrap flex-1">
						
					<?php foreach($people_list as $people):
						
						echo '<a href="' . get_the_permalink($people->ID) . '" class="hover:no-underline focus-visible:no-underline underline px-2">' . $people->post_title . '</a>';
						
					endforeach;?>
					</div>
				</div>
				
				<?php endif;
				
				if(! empty($projects_list)):?>
					
					<div class="inline text-neutral-dark-900">
						<span class="sronly font-bold">Project(s):</span>
					<div class="divide-x inline gap-1">
						
					<?php foreach($projects_list as $project):
						
						echo '<a href="' . get_the_permalink($project->ID) . '" class="hover:no-underline focus-visible:no-underline underline px-2">' . $project->post_title . '</a>';
						
					endforeach;?>
					</div>
				</div>
				
				<?php endif; 
				
				if(! empty($pub_year)):?>
					
					<div class="gap-3 inline-flex text-neutral-dark-900">
						<span class="font-bold">Published year: </span>
						<span><?php echo $pub_year;?></span>
					</div>
				
				<?php endif;?>
		
				
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			
			<?php the_content(); ?>
			
		</div><!-- .entry-content -->

		<footer class="entry-footer mt-auto">

			<?php get_template_part('components/permalink'); ?>
				
		</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
