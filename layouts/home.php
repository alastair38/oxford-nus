<?php
/**
 * Template part for displaying page content in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<header class="entry-header screen-reader-text">
	
	<?php the_title( '<h1>', '</h1>' ); ?>
	
</header><!-- .entry-header -->

<div class="space-y-24">
	
	<?php the_content();?>
	
</div><!-- .entry-content -->
