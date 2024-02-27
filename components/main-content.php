<?php
/**
 * Template part for displaying main content area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */



?>

<div class="space-y-12 mb-0 md:mb-12">
	<div id="content" class="space-y-6">
			<?php

			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blockhaus' ),
					'after'  => '</div>',
				)
			);
			
			?>

	</div><!-- #content -->
	<?php if(function_exists('get_field')):
			
		$outputs = get_field('outputs');
				
	endif;
			
	if(! empty($outputs)):?>
		
		<aside id="outputs" class="space-y-6 bg-neutral-light-100 p-6">
			<h2 class="font-black underline"><?php echo esc_html__( 'Outputs', 'blockhaus' );?></h2>
			<ul class="grid grid-cols-1 gap-6">
				
			<?php foreach($outputs as $output):?>
					
				<li class="grid gap-2"><a class="font-bold" href="<?php echo get_the_permalink($output->ID);?>"><?php echo $output->post_title;?></a>
				<div class="text-sm">
			<?php echo $output->post_content;?></div>
			</li>
					
			<?php	endforeach;?>
				
			</ul>
		</aside> <!-- #outputs -->
		
	<?php endif;?>
</div>