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
$image = get_field('author_image', $term);
$contact = get_field('contact', $term);
$post_type = get_post_type();
$description = get_field($post_type . '_description', 'option');
$post_type_obj = get_post_type_object( $post_type);

?>

<header class="border bg-slate-700 bg-checked bg-check-size grid place-content-center aspect-[3/1] space-y-2 md:space-y-6 rounded-md">

<h1 class="page-title text-xl md:text-huge text-center m-0 font-black text-white"><?php echo $header->title;?></h1>


<div class="term-meta px-6 w-10/12 md:w-3/4 text-default text-center mx-auto space-y-6 md:space-y-12">

<?php
				if(is_post_type_archive() || is_home()):
					
				if(!empty($description)):
					
					echo '<p class="text-sm text-white">' . $description . '</p>';
					
				endif;
					
				echo blockhaus_custom_form($post_type_obj->labels->name, $post_type); 
				
				endif;?>

	</div>
</header><!-- .page-header -->