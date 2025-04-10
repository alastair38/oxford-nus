<?php
/**
 * Template part for displaying main content area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<div class="space-y-12 mb-0 md:mb-12">
	<div id="content" class="space-y-6">
			<?php

			the_content();?>

	
  
  <?php if(is_singular('output')):

  $published = get_field('published_year');

    if($published):
      echo '<p class="text-sm mt-6">Published: ' . $published . '</p>';
    endif;

  endif;?>

  </div><!-- #content -->
  
	<!-- Start 'grant' post type fields  -->
	<?php
  
  if( get_post_type() === 'grant' ): ?>
  <div class="border border-neutral-light-900 p-6 rounded-md space-y-6 text-sm">
    <?php 
    $grant_projects = get_field('grant_projects');
    $grant_people = get_field('grant_people');
    $grant_outputs = get_field('grant_outputs');
    $start_date = get_field('start_date');
    $end_date = get_field('end_date');
    
    if($start_date || $end_date):?>
  
    <div class="flex flex-col gap-4">
      <span class="font-black"><?php esc_html_e( 'Grant Dates', 'blockhaus' );?></span>
      <div class="flex gap-1 flex-wrap">
        
        <?php if($start_date):
          echo '<span>' . $start_date . '</span>';
        endif;
        
        if($start_date || $end_date):
          echo '<span class="italic">to</span>';
        endif;
        
        if($end_date):
          echo '<span>' . $end_date . '</span>';
        endif;?>
      
      </div>
    </div>
    
  <?php endif;
  
  if( $grant_projects ): ?>
  
  <div class="flex flex-col gap-4">
    <span class="font-black"><?php esc_html_e( 'Funded Projects', 'blockhaus' );?></span>
      <div class="grid grid-cols-1 gap-2 flex-wrap">
      <?php foreach( $grant_projects as $post ): ?>
        
        <a class="flex gap-2 underline hover:no-underline focus-visible:no-underline" href="<?php echo get_the_permalink($post->ID); ?>">
          <?php echo get_the_title($post->ID); ?>
        </a>
        
      <?php endforeach; ?>
      </div>
  </div>

<?php wp_reset_postdata(); endif;

  if($grant_people):?>
    
    <div class="flex flex-col gap-4">
    <span class="font-black"><?php esc_html_e( 'People', 'blockhaus' );?></span>
      <div class="grid grid-cols-1 gap-2 flex-wrap">
      <?php foreach( $grant_people as $post ): ?>
        
        <a class="flex gap-2 underline hover:no-underline focus-visible:no-underline" href="<?php echo get_the_permalink($post->ID); ?>">
          <?php echo get_the_title($post->ID); ?>
        </a>
        
      <?php endforeach; ?>
      </div>
  </div>
    
  <?php wp_reset_postdata(); endif;?>
 
</div>

<?php if( $grant_outputs ): ?>
  
  <div class="flex flex-col gap-4 border p-6 text-sm">
    <span class="font-black"><?php esc_html_e( 'Grant outputs', 'blockhaus' );?></span>
      <div class="grid grid-cols-1 gap-2 flex-wrap">
      <?php foreach( $grant_outputs as $post ): ?>
        
        <a class="flex gap-2 underline hover:no-underline focus-visible:no-underline flex-wrap items-center" href="<?php echo get_the_permalink($post->ID); ?>">
          <?php echo get_the_title($post->ID); ?>
        </a>
        
      <?php endforeach; ?>
      </div>
  </div>

<?php wp_reset_postdata(); endif;

endif;?>
 
 <!-- end 'grant' post type fields -->

	<?php if(function_exists('get_field')):
			
		$outputs = get_field('outputs');
				
	endif;
			
	if(! empty($outputs)):?>
		
		<aside id="outputs" class="space-y-6 rounded-md border border-neutral-light-900 p-6">
			<h2 class="font-black"><?php echo esc_html__( 'Outputs', 'blockhaus' );?></h2>
			<ul class="grid grid-cols-1 gap-6">
				
			<?php foreach($outputs as $output):?>
					
				<li class="grid gap-3 border-b border-neutral-light-900 pb-6 last-of-type:pb-0 last-of-type:border-none">
          <span><?php echo $output->post_title;?></span>
          <div class="text-sm">
            <?php echo $output->post_content;?>
          </div>
          <a class="no-underline hover:outline focus-visible:outline focus-visible:outline-contrast hover:outline-contrast focus-visible:outline-offset-2 hover:outline-offset-2 bg-contrast w-fit text-sm text-white px-3 py-1 rounded-md" href="<?php echo get_the_permalink($output->ID);?>">
            <?php esc_html_e( 'View output', 'blockhaus' );?>
          </a>
			  </li>
					
			<?php	endforeach;?>
				
			</ul>
		</aside> <!-- #outputs -->
		
	<?php endif;?>
</div>