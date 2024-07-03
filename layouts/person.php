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
		
	<div class="space-y-6">
	<p><?php echo get_field('biography', $post->ID); ?></p>
	
	<?php if($further_info):?>
	<a aria-label="View institution biography for <?php the_title(); ?>" class="flex gap-2 w-fit items-center bg-contrast text-white text-sm px-3 py-1 rounded-full hover:ring-2 focus:ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast" href="<?php echo $further_info; ?>">View institution biography
  
  </a>
	
	<?php endif;?>

	</div>
		
		<aside class="md:sticky top-28 entry-meta col-span-1 text-sm h-max space-y-6">

		<?php get_template_part( 'components/post-meta' );?>
		

		</aside>

	</div>

</article>