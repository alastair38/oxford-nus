<?php
/**
 * Full width header component
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
 
 <?php if(get_post_type() === 'output' || get_post_type() === 'grant'):?>
 
	<div class="pt-6">
		<span aria-hidden="true" class="text-sm uppercase">
			<?php esc_html_e( 'OCNS ' . get_post_type() , 'blockhaus' );?>
		</span>
		<h1 class="page-title text-default md:text-lg leading-snug lg:leading-normal font-black">
			<?php the_title();?>
		</h1>
	</div>
	
	<?php elseif(get_post_type() === 'project' && has_post_parent( )):?>
		
		<div>
		<span aria-hidden="true" class="text-sm uppercase">
			<?php esc_html_e( 'OCNS ' . get_post_type() , 'blockhaus' );?>
		</span>
		<h1 class="page-title text-default md:text-lg leading-snug lg:leading-normal font-black">
			<?php the_title();?>
		</h1>
	</div>

	<?php else:?>
		
		<h1 class="page-title leading-snug text-default md:text-lg lg:leading-normal font-black"><?php the_title();?></h1>
	<?php endif;?>
	
	<hr aria-hidden="true" class="border-neutral-light-100">

</header><!-- .page-header -->