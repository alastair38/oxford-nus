<?php
/**
 * Template part for displaying page content in page-full.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="space-y-12 ">

<?php get_template_part('components/full-width-header'); ?>
	
		
		<?php the_content(); ?>


</article><!-- #post-<?php the_ID(); ?> -->
