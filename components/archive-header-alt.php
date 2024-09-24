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

<header class="border bg-slate-700 p-6 bg-checked bg-check-size flex flex-col justify-center aspect-[3/1] space-y-2 md:space-y-6 rounded-md relative">

<h1 class="page-title text-xl leading-tight max-w-2xl mx-auto md:text-huge text-center m-0 font-black text-white">
	<?php echo $header->title;?>



	<?php 
	
	if(! empty(get_query_var( 'pub_year' ) || get_query_var( 'assigned-project' ))):
	echo 'Outputs';
	
	endif;
	?>
</h1>
<div class="term-meta w-full md:w-3/4 text-default mx-auto space-y-6 md:space-y-12">

<?php

				if(is_post_type_archive() || is_tax() || is_home()):
					
				if(!empty($description)):
					
					echo '<p class="text-sm text-white text-center text-balance">' . $description . '</p>';
					
				endif;
			endif;
				
				?>
					
				
			
				<div id="filters" class="justify-center flex gap-12">
<?php echo do_shortcode( '[searchandfilter submit_label="Search" post_types="output" fields="search,pub_year,assigned-project"]' ); ?>
			

	</div>
</header><!-- .page-header -->