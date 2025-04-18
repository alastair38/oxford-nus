<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$post_type = get_post_type();?>

<div class="bg-neutral-light-100 p-6 space-y-8 md:space-y-12 rounded-md">

  <?php
  
  /* 'post' specific fields */
  if(get_post_type() === 'post'):?>
  
    <div class="flex flex-col">
    <?php blockhaus_posted_by($post);
      blockhaus_posted_on();?>
    </div>
    
  <?php endif;
  
  /* end 'post' specific fields */
  
  /* 'project' specific fields */
  
  if(get_post_type() === 'project'):
    
    if(function_exists('get_field')):
  
      $sidebar = get_field('sidebar_hide');
      $members = get_field('members');
      $assoc_members = get_field('assoc_members');
      $collab_members = get_field('collab_members');
      $co_investigators = get_field('co-investigators');
      $funders = get_field('project_funders');
      $grants = get_field('project_grants');
      $projects = get_field('projects');
      
    endif;

    if(empty($sidebar)):
      
    if( $members ): 
      blockhaus_projects_team($members);
    endif;

    if( $co_investigators ):
      blockhaus_projects_team($co_investigators);
    endif; 

    if( $collab_members ):
      blockhaus_projects_team($collab_members);
    endif; 

    if( $assoc_members ):
      blockhaus_projects_team($assoc_members);
    endif;

  endif;

  if( $grants ):
    
    blockhaus_grants($grants, 'Funding grant(s)');
    
  endif;
    
endif;
 
 /* end 'project' specific fields */

$post_tags = get_the_tags();

if ( $post_tags ):?>
  <ul aria-labelledby="tagsList" class="flex gap-y-2 gap-x-4 items-center flex-wrap">
    <li id="tagsList" class="w-full"><?php esc_html_e( 'Tags', 'blockhaus' );?></li>
    <?php foreach( $post_tags as $tag ) {
        echo '<li><a class="px-3 py-1 bg-neutral-light-900 text-contrast hover:ring-2 ring-offset-2 hover:ring-primary focus:ring-2 focus:ring-primary rounded-full" href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a></li>'; 
      } ;?>
  </ul>
<?php endif;
 
/* 'output' specific fields */
  
if( $post_type === 'output' ): 
    
  if(function_exists('get_field')):
    
  $output_projects = get_field('associated_projects');
  $output_people = get_field('associated_people');
  $output_grants = get_field('associated_grants');
  
  endif;
  
  if( $output_projects ):
    
    blockhaus_projects($output_projects, 'Project(s)');
    
  endif; 
    
  if( $output_people ):
       
    blockhaus_people($output_people, 'People'); 
      
  endif;
    
  if( $output_grants ):
    
    blockhaus_grants($output_grants, 'Funding grant(s)');
      
  endif; 
  
endif;
  
/* end 'output' specific fields */ 
 
/* 'grant' specific fields */
  
if( $post_type === 'grant' ): 
    
  if(function_exists('get_field')):
    
  $grant_link = get_field('grant_link');
  $grant_logo = get_field('grant_logo');
  $grant_funders = get_field('grant_funder');
  
  endif;
  
  blockhaus_grant_details($grant_link, $grant_logo, $grant_funders);
 
  if( $grant_funders ):
    
   blockhaus_funders($grant_funders, 'Funder(s)');
    
  endif; 
  
endif;
  
/* end 'grant' specific fields */
   
/* 'person' specific fields */
   
if( $post_type === 'person' ):
    
  if(function_exists('get_field')):
    
    $person_projects = get_field('projects');
      
  endif;
    
  if( $person_projects ):
      
    blockhaus_projects($person_projects, 'Project(s)');
    
  endif; 
      
endif;
  
/* end 'person' specific fields */
  
  get_template_part( 'components/share-buttons' );?>
  
</div>