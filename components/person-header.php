<?php
/**
 * Full width header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 // get the header object from blockhaus_header_layout()

?>

<header class="entry-header space-y-6 md:mt-12">
	
<div class="flex gap-3 items-center">
	<?php if(is_singular() && has_post_thumbnail()):
	the_post_thumbnail( 'post_thumbnail', ['class' => 'rounded-full h-20 w-20 aspect-square object-cover'] );
 endif;?>
 <div>
 <h1 class="page-title font-black"><?php the_title();?></h1>
 <p class="text-sm"><?php echo esc_html( get_field('work_title', $post->ID) ); ?></p>
</div>
</div>


<hr aria-hidden="true" class="border-neutral-light-100">



</header><!-- .page-header -->