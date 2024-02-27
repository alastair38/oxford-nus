<?php
/**
 * Template part for displaying default header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<header class="entry-header space-y-6">
	
<?php if(is_singular() && has_post_thumbnail()):
	the_post_thumbnail( 'header', ['class' => 'w-full aspect-[3/1] h-full object-cover'] );
 endif;?>

	<?php the_title( '<h1 class="text-xl md:text-huge leading-none font-black font-sans">', '</h1>' ); ?>
	<hr class="w-full border-neutral-light-900">
		
</header><!-- .entry-header -->