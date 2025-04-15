<?php
/**
 * Component for displaying social media sharing buttons
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<div>
	
	<p class="sr-only"><?php _e( 'Share this', 'blockhaus' );?></p>

	<ul class="flex gap-6 justify-between">
		<li>
			<a class="flex gap-1 items-center group no-underline" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noreferrer" aria-label="Share this content on Twitter"><span class="hidden md:inline-block"><?php _e( 'Twitter', 'blockhaus' );?></span>
			<svg class="fill-current group-hover:scale-110 duration-200 w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#twitter" /></svg>
			</a>
		</li>

		<li>
			<a class="flex gap-1 items-center group no-underline" href="https://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="noreferrer" aria-label="Share this content on Facebook"><span class="hidden md:inline-block"><?php _e( 'Facebook', 'blockhaus' );?></span>
			<svg class="fill-current group-hover:scale-110 duration-200 w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#facebook" /></svg>
			</a>
		</li>

		<li>
			<a class="flex gap-1 items-center group no-underline" href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php echo get_the_permalink(); ?>" target="_blank" rel="noreferrer" aria-label="Share this content by email"><span class="hidden md:inline-block"><?php _e( 'Email', 'blockhaus' );?></span>
				<svg class="fill-current group-hover:scale-110 duration-200 w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#mail" /></svg>
			</a> 
		</li>
	</ul>

</div>
