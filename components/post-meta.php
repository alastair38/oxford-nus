<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */
if(function_exists('get_field')):
  
$sidebar = get_field('sidebar_hide');
$members = get_field('members');
$assoc_members = get_field('assoc_members');
$collab_members = get_field('collab_members');
$funders = get_field('project_funders');
$projects = get_field('projects');

endif;


?>
<div class="bg-neutral-light-100 p-6 space-y-12 rounded-md">

    <?php
    
    if(get_post_type() === 'post'):?>
      <div class="flex flex-col">
      <?php blockhaus_posted_by($post);
        blockhaus_posted_on();?>
      </div>
   <?php endif;

if(empty($sidebar)):
  
if( $members ): 
  blockhaus_projects_team($members);
endif;

if( $assoc_members ):
  blockhaus_projects_team($assoc_members);
endif; ?>

  
<?php if( $collab_members ):
  blockhaus_projects_team($collab_members);
endif; ?>

<?php endif;?>
    
<?php if( $funders ): ?>
  <div class="space-y-3">
      <span class="font-black"><?php esc_html_e( 'Funders', 'blockhaus' );?></span>
    <hr class="border-neutral-light-900 hidden md:block">
    <ul aria-label="Project Funders" class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
  <?php foreach( $funders as $funder ):?>
    <li><a class="flex" href="<?php echo $funder['website'];?>">
    <?php if(! empty($funder['logo'])):?>
    <img src="<?php echo $funder['logo']['url'];?>" alt="<?php echo $funder['logo']['alt'];?>" width="<?php echo $funder['logo']['width'];?>" height="<?php echo $funder['logo']['height'];?>" loading="lazy">
    <?php endif;?>
    <span class="sr-only"><?php echo $funder['name'];?></span>
   
    
     </a></li>
<?php endforeach;?>
    </ul></div>
<?php endif;?>

<?php $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );


$post_tags = get_the_tags();

  if ( $post_tags ):?>
  <ul aria-labelledby="tagsList" class="flex gap-y-2 gap-x-4 items-center flex-wrap">
    <li id="tagsList" class="w-full"><?php esc_html_e( 'Tags', 'blockhaus' );?></li>
    <?php foreach( $post_tags as $tag ) {
        echo '<li><a class="px-3 py-1 bg-neutral-light-900 text-contrast hover:ring-2 ring-offset-2 hover:ring-primary focus:ring-2 focus:ring-primary rounded-full" href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a></li>'; 
      } ;?>
  </ul>
  <?php endif;?>
  
  <?php
  if( $projects): ?>
  
  <div class="flex flex-col gap-4">
    <span class="text-sm font-black"><?php esc_html_e( 'Projects', 'blockhaus' );?></span>
      <div class="grid grid-cols-1 gap-2 flex-wrap">
      <?php foreach( $projects as $post ): ?>
        
        <a class="flex gap-2 text-sm underline flex-wrap items-center bg-contrasttext-whitetext-smpx-3py-1rounded-fullhover:ring-2 focus:ring-2ring-offset-2 ring-transparenthover:ring-contrastfocus:ring-contrast" href="<?php echo get_the_permalink($post->ID); ?>">
          <?php echo get_the_title($post->ID); ?>
        </a>
        
      <?php endforeach; ?>
      </div>
  </div>

<?php wp_reset_postdata(); endif; ?>

  <?php get_template_part( 'components/share-buttons' );?>
  
</div>