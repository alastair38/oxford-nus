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

		
		<header class="entry-header space-y-3">
		
		
			<?php
			
			the_title( '<h2 class="text-default font-bold md:leading-tight">', '</h2>' );

			?>
			
		
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			
			<?php the_content(); ?>
			
		</div><!-- .entry-content -->
		
		<div class="entry-meta bg-neutral-light-100 p-3 rounded-md flex flex-col gap-6 text-sm">
				
				
				<?php
				
				
				$grantFunder = get_field('grant_funder');
				
				if(! empty($grantFunder)):?>
					
					<div class="flex flex-col gap-1 text-neutral-dark-500">
						<span class="font-black">Funder</span>
					
					
					<?php foreach($grantFunder as $post):
						
						echo '<span>' . get_the_title($post->ID) . '</span>';
						
					endforeach;?>
					
					</div>
				
				<?php wp_reset_postdata(); endif;
				
				$projects_list = get_field('grant_projects');
				
			//var_dump($projects_list);
				
				if(! empty($projects_list)):?>
					
					<div class="flex flex-col gap-1 text-neutral-dark-500">
						
						<span class="font-black">Projects</span>
				
						<div class="flex flex-col">
					<?php foreach($projects_list as $project):
						
						echo '<a href="' . get_the_permalink($project->ID) . '" class="hover:no-underline focus-visible:no-underline underline">' . $project->post_title . '</a>';
						
					endforeach;?>
					</div>
				</div>
				
				<?php endif;
				$people_list = get_field('grant_people');
				
				if(! empty($people_list)):?>
					
					<div class="flex flex-col gap-1 text-neutral-dark-500">
						
						<span class="font-black">People</span>
					<div class="flex flex-col">
						
					<?php foreach($people_list as $person):
						
						echo '<a href="' . get_the_permalink($person->ID) . '" class="hover:no-underline focus-visible:no-underline underline">' . $person->post_title . '</a>';
						
					endforeach;?>
					</div>
				</div>
				
				<?php endif; ?>
				
				</div><!-- .entry-meta -->

		<footer class="entry-footer mt-auto">

			<?php get_template_part('components/permalink'); ?>
				
		</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
