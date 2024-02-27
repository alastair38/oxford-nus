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

<header class="entry-header space-y-6">
	
	<?php if(is_singular() && has_post_thumbnail()):
	the_post_thumbnail( 'header', ['class' => 'w-full aspect-[3/1] h-full object-cover'] );
 endif;?>
 
 <?php if(is_singular('output')):
	$imgObj = get_field('branding', 'option');
	//print_r($imgObj);
	?>
 <div class="border bg-slate-700 grid aspect-[3/1]">
	
 <img class="w-full aspect-[3/1] h-full object-cover mix-blend-multiply" src="<?php echo $imgObj['featured_image']['url'];?>" alt="">
 
</div>

<?php endif;?>

<h1 class="page-title leading-snug lg:leading-normal font-black md:mt-12"><?php the_title();?></h1>
<hr aria-hidden="true" class="border-neutral-light-100">



</header><!-- .page-header -->