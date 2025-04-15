<?php
/**
 * Template part for displaying content in page-full.php and single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="container mx-auto space-y-6">

	<?php get_template_part('components/full-width-header'); ?>
	
	<div class="w-full grid grid-cols-1 md:grid-cols-prose gap-12 ">

		<?php get_template_part('components/main-content'); ?>
		
		<aside class="md:sticky top-28 entry-meta col-span-1 text-sm h-max space-y-6">

			<?php get_template_part( 'components/post-meta' );?>

		</aside>

	</div>

</article>