<?php
/**
 * Template part for displaying person CPT content
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
		
		<div>
			<div class="space-y-6 mb-12">
				<p><?php echo get_field('biography', $post->ID); ?></p>
		
			<?php if($further_info):?>
				<a aria-label="View institution biography for <?php the_title(); ?>" class="flex gap-2 mb-6 w-fit items-center bg-contrast text-white text-sm px-3 no-underline py-1 rounded-md hover:ring-2 focus:ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast" href="<?php echo $further_info; ?>">
					<?php esc_html_e( 'View institution biography', 'blockhaus' );?>
				</a>
			<?php endif;?>
			</div>
		
		<?php if(function_exists('get_field')):
				
				$outputs = get_field('person_outputs');
						
			endif;
					
			if(! empty($outputs)):
				
				blockhaus_outputs($outputs, 'Outputs', 'View output');
				
			endif;?>

		</div>
		
		<aside class="md:sticky top-28 entry-meta col-span-1 text-sm h-max space-y-6">

			<?php get_template_part( 'components/post-meta' );?>
		
		</aside>

	</div>

</article>