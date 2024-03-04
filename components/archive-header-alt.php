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

<h1 class="page-title text-xl max-w-2xl mx-auto md:text-huge text-center m-0 font-black text-white">
	<?php echo $header->title;?>
	
	
</h1>

	<?php 
	
	// if(! empty(get_query_var( 'pub_year' ) && get_query_var( 'assigned-project' ))):
	// 	$year = get_term_by('slug', get_query_var( 'pub_year' ), 'pub_year');
	// 	$project = get_term_by('slug', get_query_var( 'assigned-project' ), 'assigned-project');
	// 	echo $project->name . ' (' . $year->name . ')';
		
	// 	elseif(! empty(get_query_var( 'pub_year' ) || get_query_var( 'assigned-project' ))):
			
	// 	echo $header->title;
		
	// 	else:
	
	// endif;
	?>

<div class="term-meta px-6 w-10/12 md:w-3/4 text-default mx-auto space-y-6 md:space-y-12">

<?php

				if(is_post_type_archive() || is_tax() || is_home()):
					
				if(!empty($description)):
					
					echo '<p class="text-sm text-white text-center">' . $description . '</p>';
					
				endif;?>
					
				
				<?php echo blockhaus_custom_form($post_type_obj ? $post_type_obj->labels->name : '', $post_type); 
				
				endif;?>
				<div id="filters" class="justify-center flex gap-12">

				<form  class="category-select flex flex-wrap gap-3 text-sm" method="get">
	<?php 
	
				wp_dropdown_categories( [
					'show_option_all' => 'Select year',
					'taxonomy' => 'pub_year',
					'name'            => 'pub_year', // same as the "taxonomy" above
					'value_field'     => 'slug',  // use the term slug
					'selected'        => get_query_var( 'pub_year' ),
					'class'	=> 'rounded-md border bg-transparent text-neutral-light-100 leading-none text-sm',
					'hide_empty' => true,] );
					
				wp_dropdown_categories( [
					'show_option_all' => 'Select project',
					'taxonomy' => 'assigned-project',
					'name'            => 'assigned-project', // same as the "taxonomy" above
					'value_field'     => 'slug',  // use the term slug
					'selected'        => get_query_var( 'assigned-project' ),
					'class'	=> 'rounded-md border bg-transparent text-neutral-light-100 leading-none text-sm w-40',
					'hide_empty' => true,] );
				
	?>
					<button class="bg-neutral-light-100 rounded-md px-3 hover:bg-neutral-light-500 focus:bg-neutral-light-500"><?php esc_html_e( 'Filter outputs', 'blockhaus' );?></button>
					
					<a href="<?php echo get_post_type_archive_link( get_post_type() );?>" class="outline outline-primary outline-1 outline-offset-2 bg-neutral-light-100 hover:outline-transparent focus:outline-transparent rounded-md px-3 flex items-center">
						<?php esc_html_e( 'All outputs', 'blockhaus' );?>
				</a>
</form>


	</div>
</header><!-- .page-header -->