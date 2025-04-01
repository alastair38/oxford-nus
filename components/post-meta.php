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

  if( $grants ): ?>
    
    <div class="flex flex-col gap-6">
      <span class="text-sm font-black flex border-b border-neutral-light-900"><?php esc_html_e( 'Funding grant', 'blockhaus' );?></span>
      
      <?php foreach( $grants as $post ):?>
      <div class="space-y-3">
      <?php 
      
      if(function_exists('get_field')):
      
      $grant_logo = get_field('grant_logo', $post->ID);
      
      endif;
      
      if($grant_logo):?>
      
        <img class="object-contain mr-auto" src="<?php echo $grant_logo['url'];?>" alt="<?php echo $grant_logo['alt'];?>" width="75" height="75" loading="lazy" />
          
      <?php endif;?>
    
        <a class="flex w-fit underline hover:no-underline focus-visible:no-underline gap-2 text-sm flex-wrap items-center" href="<?php echo get_the_permalink($post->ID); ?>">
           <?php echo get_the_title($post->ID); ?>
        </a>
      </div>
      
      <?php endforeach; ?>
        
    </div>

  <?php wp_reset_postdata(); 
    
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
  
    if( $output_projects ): ?>
    
      <div class="flex flex-col gap-3">
        <span class="text-sm font-black border-b border-neutral-light-900"><?php esc_html_e( 'Projects(s)', 'blockhaus' );?></span>
        
        <div class="grid grid-cols-1 gap-2 flex-wrap">
          
          <?php foreach( $output_projects as $post ):?>
            
          <a class="flex underline hover:no-underline focus-visible:no-underline gap-2 text-sm flex-wrap items-center" href="<?php echo get_the_permalink($post->ID); ?>">
            <?php echo get_the_title($post->ID); ?>
          </a>
            
          <?php endforeach; ?>
          
        </div>
      </div>
    
      <?php wp_reset_postdata(); 
    
    endif; 
    
    if( $output_people ): ?>
    
      <div class="flex flex-col gap-3">
        <span class="text-sm font-black border-b border-neutral-light-900"><?php esc_html_e( 'People', 'blockhaus' );?></span>
       
        <div class="grid grid-cols-1 gap-2 flex-wrap">
          
          <?php foreach( $output_people as $post ):?>
            
          <a class="flex underline hover:no-underline focus-visible:no-underline gap-2 text-sm flex-wrap items-center" href="<?php echo get_the_permalink($post->ID); ?>">
            <?php echo get_the_title($post->ID); ?>
          </a>
            
          <?php endforeach; ?>
          
        </div>
      </div>
    
      <?php wp_reset_postdata(); 
    
    endif;
    
    if( $output_grants ): ?>
    
      <div class="flex flex-col gap-6">
        <span class="text-sm font-black border-b border-neutral-light-900"><?php esc_html_e( 'Funding grant', 'blockhaus' );?></span>
        
        <?php foreach( $output_grants as $post ):?>
          <div class="space-y-3">
        <?php 
        
        if(function_exists('get_field')):
          
        $grant_logo = get_field('grant_logo', $post->ID);
        
        endif;
      
        if($grant_logo):?>
        
          <img class="object-contain mr-auto" src="<?php echo $grant_logo['url'];?>" alt="<?php echo $grant_logo['alt'];?>" width="75" height="75" loading="lazy" />
            
        <?php endif;?>
      
          <a class="flex underline hover:no-underline focus-visible:no-underline gap-2 text-sm flex-wrap items-center" href="<?php echo get_the_permalink($post->ID); ?>">
             <?php echo get_the_title($post->ID); ?>
          </a>
        </div>
        
        <?php endforeach; ?>
          
      </div>
  
    <?php wp_reset_postdata(); 
      
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
  
    if(! empty($grant_logo) && $grant_link):?>
      <a href="<?php echo $grant_link;?>">
        <span class="sr-only">Grant homepage</span>
        <img class="object-contain mx-auto" src="<?php echo $grant_logo['url'];?>" alt="<?php echo $grant_logo['alt'];?>" width="150" height="150" loading="lazy">
      </a>
    <?php endif;
    
    if(! empty($grant_logo) && !$grant_link):?>
      
        <img class="object-contain mx-auto" src="<?php echo $grant_logo['url'];?>" alt="<?php echo $grant_logo['alt'];?>" width="150" height="150" loading="lazy">
      
    <?php endif;
    
    if(empty($grant_logo) && $grant_link):?>
      <a class="w-fit px-3 mt-6 py-1 rounded-md bg-contrast text-white flex mx-auto" href="<?php echo $grant_link;?>">
        Grant homepage
      </a>
    <?php endif;
 
  
    if( $grant_funders ): ?>
    
      <div class="flex flex-col gap-6">
        <span class="text-sm font-black border-b border-neutral-light-900"><?php esc_html_e( 'Funder(s)', 'blockhaus' );?></span>
        <div class="grid grid-cols-1 gap-2 flex-wrap">
          
          <?php foreach( $grant_funders as $post ): 
          
          if(function_exists('get_field')):
            
          $logo = get_field('funder_logo');
          
          endif;?>
          
          <?php if(! empty($logo)):?>
          <img class="object-contain mx-auto" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>" width="75" height="75" loading="lazy">
          <?php endif;?>
          
          <span class="flex gap-2 text-sm w-fit mx-auto flex-wrap items-center">
            <?php echo get_the_title($post->ID); ?>
          </span>
            
          <?php endforeach; ?>
          
        </div>
      </div>
    
      <?php wp_reset_postdata(); 
    
    endif; 
  
  endif;
  
   /* end 'grant' specific fields */
   
   /* 'person' specific fields */
   
  if( $post_type === 'person' ):
    
    if(function_exists('get_field')):
    
      $person_projects = get_field('projects');
      
    endif;
    
    if( $person_projects ): ?>
    
      <div class="flex flex-col gap-3">
        <span class="text-sm font-black border-b border-neutral-light-900"><?php esc_html_e( 'Projects(s)', 'blockhaus' );?></span>
        
        <div class="grid grid-cols-1 gap-2 flex-wrap">
          
          <?php foreach( $person_projects as $post ):?>
            
          <a class="flex underline hover:no-underline focus-visible:no-underline gap-2 text-sm flex-wrap items-center" href="<?php echo get_the_permalink($post->ID); ?>">
            <?php echo get_the_title($post->ID); ?>
          </a>
            
          <?php endforeach; ?>
          
        </div>
      </div>
    
      <?php wp_reset_postdata(); 
    
    endif; 
    
    
    
  endif;
  
  /* end 'person' specific fields */
  
  get_template_part( 'components/share-buttons' );?>
  
</div>