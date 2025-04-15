<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="container mx-auto space-y-6">

	<?php get_template_part('components/full-width-header'); ?>
	
	<div class="w-full grid grid-cols-1 md:grid-cols-prose gap-12 ">
			
		<div id="content"  class="space-y-6">
			<?php the_content(); ?>
		</div>

		<aside class="p-6 space-y-6 h-fit text-sm rounded-md bg-neutral-light-100 sticky top-28 grid place-content-center gap-3 text-center">
			
			<?php 
			if(function_exists('get_field')):
			
			$links = get_field('sidebar_link');
			
			endif;
			
			if(! empty($links)):?>
			
			<div class="grid space-y-2">
				
				<h2 class="text-default font-black"><?php esc_html_e( 'Links', 'blockhaus' );?></h2>
				
				<?php foreach($links as $link):?>
				
				<a class="hover:underline focus-visible:underline" href="<?php echo get_the_permalink( $link->ID );?>">
					<?php echo $link->post_title;?>
				</a>
			
				<?php endforeach;?>
				
			</div>
		<?php endif;?>

		<?php get_template_part( 'components/share-buttons' );?>
			
		</aside>
		
	</div><!-- .entry-content -->

</article><!-- #post-... -->
