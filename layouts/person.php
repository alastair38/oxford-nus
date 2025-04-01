<?php
/**
 * Template part for displaying content in page-full.php and single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 $further_info = get_field('further_information', $post->ID);

?>

<article id="post-<?php the_ID(); ?>" class="container mx-auto space-y-6">

	<?php get_template_part('components/person-header'); ?>
	
	<div class="w-full grid grid-cols-1 md:grid-cols-prose gap-12 ">
		
	<div class="">
		<div class="space-y-6 mb-12">
		<p><?php echo get_field('biography', $post->ID); ?></p>
	
	<?php if($further_info):?>
	<a aria-label="View institution biography for <?php the_title(); ?>" class="flex gap-2 mb-6 w-fit items-center bg-contrast text-white text-sm px-3 no-underline py-1 rounded-md hover:ring-2 focus:ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast" href="<?php echo $further_info; ?>">View institution biography
  
  </a>
	
	<?php endif;?>
	</div>
	
	<?php if(function_exists('get_field')):
			
			$outputs = get_field('person_outputs');
					
		endif;
				
		if(! empty($outputs)):?>
			
			<aside id="outputs" class="space-y-6 rounded-md border border-neutral-light-900 p-6">
				<h2 class="font-black"><?php echo esc_html__( 'OCNS Outputs', 'blockhaus' );?></h2>
				<ul class="grid grid-cols-1 gap-8">
					
				<?php foreach($outputs as $output):?>
						
					<li class="grid gap-3">
						<span><?php echo $output->post_title;?></span>
						<div class="text-sm">
							<?php echo $output->post_content;?>
						</div>
						<a class="no-underline hover:outline focus-visible:outline focus-visible:outline-contrast hover:outline-contrast focus-visible:outline-offset-2 hover:outline-offset-2 bg-contrast w-fit text-sm text-white px-3 py-1 rounded-md" href="<?php echo get_the_permalink($output->ID);?>">
							<?php esc_html_e( 'View output', 'blockhaus' );?>
						</a>
					</li>
				
						
				<?php	endforeach;?>
					
				</ul>
			</aside> <!-- #outputs -->
			
		<?php endif;?>

	</div>
		
		<aside class="md:sticky top-28 entry-meta col-span-1 text-sm h-max space-y-6">

		<?php get_template_part( 'components/post-meta' );?>
		

		</aside>

	</div>
	
	

</article>