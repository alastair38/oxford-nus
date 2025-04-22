<?php
/**
 * Template part for displaying main content area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<div class="space-y-6 md:space-y-8">
	<div id="content" class="space-y-6">
    
  <!-- single 'output' pages get different #content layout  -->
		<?php
      
      if(!is_singular('output')):

			the_content();
      
    endif;?>
  
    <?php if(is_singular('output')):?>

    <?php 
    
      if(function_exists('get_field')):
        $published = get_field('published_year');
      endif;

      if($published):
        echo '<p class="text-sm">Published: ' . $published . '</p>';
      endif;?>
      
      <div data-type="citation">
        <?php the_content();?>
      </div>
      
      <button id="copy_citation" class="disabled:bg-neutral-light-500 disabled:text-black group flex items-center gap-2 rounded-md text-sm inline-block w-fit bg-contrast disabled:ring-neutral-light-500 text-white px-6 py-2 hover:ring-1 duration-100 no-underline focus:ring-1 ring-offset-2 ring-transparent hover:ring-contrast focus-visible:ring-contrast focus-visible:outline-none">
        <span><?php esc_html_e( 'Copy citation', 'blockhaus' );?></span>
        <svg class="group-disabled:hidden h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
            <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
          </g>
        </svg>
        <svg class="group-disabled:block hidden h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 6L9 17l-5-5" />
        </svg>
      </button>

    <?php endif;?>

  </div><!-- #content -->
  
	<!-- Start 'grant' post type fields  -->
	<?php
  
  if( is_singular( 'grant' ) ): ?>
  <div class="border border-neutral-light-500 p-3 md:p-6 rounded-md space-y-6 md:space-y-12 text-sm">
    <?php 
    if(function_exists('get_field')):
      $grant_projects = get_field('grant_projects');
      $grant_people = get_field('grant_people');
      $grant_outputs = get_field('grant_outputs');
      $start_date = get_field('start_date');
      $end_date = get_field('end_date');
    endif;
    
    if($start_date || $end_date):?>
  
    <div class="flex flex-col gap-4">
      <span class="font-black border-b border-neutral-light-900"><?php esc_html_e( 'Grant Dates', 'blockhaus' );?></span>
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
  
  if( $grant_projects ):
  
      blockhaus_projects($grant_projects, 'Funded projects');
  
  endif;

  if($grant_people):
    
    blockhaus_people($grant_people, 'People');
    
  endif;
  
  if( $grant_outputs ): 
  
    blockhaus_outputs_list($grant_outputs, 'Outputs');
  
  endif;?>
 
</div>

<?php endif;?>
 
 <!-- end 'grant' post type fields -->

	<?php 
  
  if(function_exists('get_field')):	
		$outputs = get_field('outputs');		
	endif;
			
	if(! empty($outputs)):
  
    blockhaus_outputs($outputs, 'Project outputs', 'View output');
  
  endif; 
?>
</div>