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

$post_type = get_post_type();
$description = get_field($post_type . '_description', 'option');
$post_type_obj = get_post_type_object( $post_type);

?>

<header class="rounded-md space-y-6 py-20 px-6 bg-slate-700 bg-checked bg-check-size text-white">

<h1 class="page-title text-xl md:text-huge text-center m-0 font-black">
	<?php echo $header->title;?>


</h1>

<?php

				if(is_post_type_archive() || is_tax() || is_home()):
					
				if(!empty($description)):
					
					echo '<p class="text-center text-sm text-balance">' . $description . '</p>';
					
				endif;
			endif;
				
				?>
					
</header><!-- .page-header -->
