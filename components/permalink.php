<?php
/**
 * Template part for displaying article link on listings / search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 /* If Blockhaus functionality plugin is activated, get any custom fields we need */

if(function_exists('get_field')):
	$external_link = get_field('url');
endif;?>


<a aria-label="Read <?php the_title();?>" class="rounded-md text-sm inline-block w-fit bg-contrast text-white px-6 py-2 hover:ring-2 focus:ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast"

<?php if($external_link):?>

	href="<?php echo esc_url( $external_link );?>" rel="external">

<?php else:?>
	
	href="<?php echo esc_url( get_permalink() );?>" rel="bookmark">
	
<?php endif;

if(get_post_type() === 'post'):

	_e( 'View article', 'blockhaus' );

else:
	
	_e( 'View ' . get_post_type(), 'blockhaus' );

endif;

?>

</a>

