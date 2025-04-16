<?php
/**
 * Component for displaying social media sharing buttons
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 $title = str_replace(' ', '20%', get_the_title());

?>

<div>

	<ul aria-label="Share this content" class="flex gap-6 justify-between text-neutral-dark-900">
		
		<li>
			<a class="flex gap-1 group no-underline" href="https://x.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noreferrer" aria-label="Share this content on Twitter / X">
				<span class="hidden md:inline-block"><?php _e( 'X/Twitter', 'blockhaus' );?></span>
				<svg class="fill-current group-hover:scale-110 duration-200 w-5 h-5"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/socialsprite.svg';?>#arcticons--x-twitter" /></svg>
			</a>
		</li>
			
		<li>
			<a class="flex gap-1 group no-underline" href="https://www.linkedin.com/feed/?shareActive=true&text=<?php the_title(); ?> <?php echo get_the_permalink(); ?>" target="_blank" rel="noreferrer" aria-label="Share this content on Linkedin">
				<span class="hidden md:inline-block"><?php _e( 'Linkedin', 'blockhaus' );?></span>
				<svg class="fill-current group-hover:scale-110 duration-200 w-5 h-5"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/socialsprite.svg';?>#arcticons--linkedin" /></svg>
			</a>
		</li>

		<li>
			<a class="flex gap-1 group no-underline" href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php echo get_the_permalink(); ?>" target="_blank" rel="noreferrer" aria-label="Share this content by email">
				<span class="hidden md:inline-block"><?php _e( 'Email', 'blockhaus' );?></span>
				<svg class="fill-current group-hover:scale-110 duration-200 w-5 h-5"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/socialsprite.svg';?>#arcticons--mail" /></svg>
			</a> 
		</li>
			
		<li>
			<a class="flex gap-1 group no-underline" href="https://bsky.app/intent/compose?text=<?php echo $title; ?>20%<?php echo urlencode(get_the_permalink()); ?>" target="_blank" rel="noreferrer" aria-label="Share this content on Bluesky">
				<span class="hidden md:inline-block"><?php _e( 'Bluesky', 'blockhaus' );?></span>
				<svg class="fill-current group-hover:scale-110 duration-200 w-5 h-5"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/socialsprite.svg';?>#arcticons--bluesky" /></svg>
				</a>
		</li>
	</ul>

</div>
