<?php
/**
 * Full width person header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

if(function_exists('get_field')):  
// check if ACF is activated to before grabbing field values
$academic_title = get_field('academic_title', $post->ID);
$work_title = get_field('work_title', $post->ID);
  
endif;

?>

<header class="entry-header space-y-6 md:mt-12">
	
	<div class="flex gap-3 items-center">
		<?php if(is_singular() && has_post_thumbnail()):
		the_post_thumbnail( 'post_thumbnail', ['class' => 'rounded-full h-20 w-20 aspect-square object-cover'] );
		endif;?>
		<div>
			
			<h1 class="page-title flex gap-1 font-black">
				<?php if($academic_title):?>
					<?php echo esc_html( $academic_title); ?>
				<?php endif;?>
				<?php the_title();?>
			</h1>
			
			<?php if($work_title):?>
				<p class="text-sm"><?php echo esc_html( $work_title); ?></p>
			<?php endif;?>
		</div>
	</div>

	<hr aria-hidden="true" class="border-neutral-light-100">

</header><!-- .page-header -->