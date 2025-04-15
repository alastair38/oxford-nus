<?php
/**
 * Full width header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 // get the header object from blockhaus_header_layout()

$header = blockhaus_header_layout();
$term = get_queried_object();
$post_type = get_post_type();
$post_type_obj = get_post_type_object( $post_type);

if(function_exists('get_field')):
  
	// check if ACF is activated to before grabbing field values
$image = get_field('author_image', $term);
$contact = get_field('contact', $term);
$description = get_field($post_type . '_description', 'option');

endif;

?>

<header class="bg-neutral-light-100 p-6 gap-6 col-span-2 2xl:col-span-3 flex flex-col items-center justify-center">

	<h1 class="page-title text-xl md:text-huge font-black"><?php echo $header->title;?></h1>

	<?php if($image):?>
	<img class="rounded-full object-cover aspect-square object-top" width="100" height="100" src="<?php echo $image['sizes']['medium'];?>" alt="">
	<?php endif;?>

	<?php 
	if(!empty($contact['email']) ||!empty($contact['website']) || !empty($contact['twitter']) || !empty($contact['facebook']) || !empty($contact['instagram']) || !empty($contact['youtube'])):?>

	<div class="flex gap-6">
		
		<?php if(!empty($contact['email'])):?>

		<a class="flex gap-2 items-center" href="mailto:<?php echo $contact['email'];?>"><span class="sr-only">Email <?php echo $contact['email'];?></span> <svg class="w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#mail" /></svg></a>

		<?php endif;?>

		<?php if(!empty($contact['website'])):?>

		<a class="flex gap-2 items-center" href="<?php echo $contact['website'];?>"><span class="sr-only">Visit <?php echo $contact['websitel'];?></span> <svg class="w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#website" /></svg></a>

		<?php endif;?>

		<?php if(!empty($contact['twitter'])):?>

		<a class="flex gap-2 items-center" href="<?php echo $contact['twitter'];?>"><span class="sr-only">Connect on <?php echo $contact['twitter'];?></span> <svg class="w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#twitter" /></svg></a>

		<?php endif;?>

		<?php if(!empty($contact['facebook'])):?>

			<a class="flex gap-2 items-center" href="<?php echo $contact['facebook'];?>"><span class="sr-only">Connect on <?php echo $contact['facebook'];?></span> <svg class="w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#facebook" /></svg></a>

		<?php endif;?>

	</div>

	<?php endif;?>

	<div class="term-meta text-sm space-y-6">

		<?php echo term_description();?>

		<?php
		if(is_post_type_archive() || is_home()):
						
			if(!empty($description)):
						
				echo '<p>' . $description . '</p>';
						
			endif;
					
			if(!empty($post_type_obj)):
						
				echo blockhaus_custom_form($post_type_obj->labels->name, $post_type); 
			
			endif;
					
		endif;?>

	</div>
</header><!-- .page-header -->