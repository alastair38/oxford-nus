<?php
/**
 * Adds SEO descriptions for archive pages and singular post types pages. This function depends on descriptions being set for taxonomies and the Blockhaus Functionality plugin being activated to provide options for CPT archive descriptions
 *
 * @package blockhaus
 */


function blockhaus_meta_description() {

  global $post;
  if ( is_singular() && !is_front_page() ) {  
    
      $post_description = strip_tags($post->post_content);
      // $post_description = strip_shortcodes( $post->post_content );
      $post_description = str_replace( array("\n", "\'", "\"", "\r", "\t"), ' ', $post_description );
      $post_description = mb_substr( $post_description, 0, 170, 'utf8' );
      $post_description = normalize_whitespace($post_description);
      echo '<meta name="description" content="' . $post_description . '" />' . "\n";     
    
  }
  
  if ( is_home() && !is_front_page() ) {
      $blog_page_settings = get_field("post_page_settings", "options");
  		$description = $blog_page_settings['page_description'];
      if($description):
  		$description = strip_tags($description);
  		$description = normalize_whitespace($description);
      else:
      $description = get_bloginfo( "description" );
      endif;
      echo '<meta name="description" content="' . $description . '" />' . "\n";
      echo '<link rel="canonical" href="' . site_url() . $_SERVER['REQUEST_URI'] .'">';
  }
  
  if ( is_front_page() ) {
      echo '<meta name="description" content="' . get_bloginfo( "description" ) . '" />' . "\n";
      echo '<link rel="canonical" href="' . site_url() . $_SERVER['REQUEST_URI'] .'">';
  }
  
  if ( is_category() ) {
      $description = strip_tags(category_description());
      
      if($description):
        
      $description = normalize_whitespace($description);
      
      else:
        
      $description = get_bloginfo( "description" );
      
      endif;
      
      echo '<meta name="description" content="' . $description . '" />' . "\n";
      echo '<link rel="canonical" href="' . site_url() . $_SERVER['REQUEST_URI'] .'">';   
  }

  if ( is_tax() ) {
    $description = strip_tags(term_description());
      
    if($description):
      
    $description = normalize_whitespace($description);
    
    else:
      
    $description = get_bloginfo( "description" );
    
    endif;
    
    echo '<meta name="description" content="' . $description . '" />' . "\n";
    echo '<link rel="canonical" href="' . site_url() . $_SERVER['REQUEST_URI'] .'">';
  }

    // get registered public custom post types
    $args = array(
      'public'   => true,
      '_builtin' => false
     );
  
  
    $output = 'names'; // 'names' or 'objects' (default: 'names')
    $operator = 'and'; // 'and' or 'or' (default: 'and')
      
    $post_types = get_post_types( $args, $output, $operator );
    
    // loop through all registered public custom post types and add them to the $types_to_search array
  
    if ( $post_types ) { // If there are any custom public post types.
        foreach ( $post_types  as $post_type ) { // loop through
          if ( is_post_type_archive($post_type) ) { // check if on the archive page for that post type
            $page_settings = get_field($post_type . "_description", "options"); // get post type page description from options page
            
            if($page_settings):
            
              $description = substr(strip_tags($page_settings), 0, 170);
                
            else: 
              
            $description = get_bloginfo( "description" );
              
            endif;

            echo '<meta name="description" content="' . $description . '" />' . "\n";
            echo '<link rel="canonical" href="' . site_url() . $_SERVER['REQUEST_URI'] .'">';

        }
      }
    }
}
add_action( 'wp_head', 'blockhaus_meta_description');


// filter title tag for resource-type tax

add_filter( 'pre_get_document_title', 'filter_document_title' );
function filter_document_title( $title ) {
  
  if (is_tax('resource-type')) {
      
    $title = 'Resources: ' . get_the_archive_title() . ' - ' . get_bloginfo('name');
  
    return $title;
  }

}

function blockhaus_opengraph() {
  
  $img = get_field('branding', 'options');
  $type = 'website';
  
  if($img):
    
    $img = $img['social_image'] ;
    $img = $img['sizes']['social-media'];
  
  else: 
    
  $img = get_template_directory_uri() . '/assets/images/social/og.jpg';
  
  endif;
  
  global $post;
    if(is_singular()) {

      $title = get_the_title();
      $type = 'article';

      if(has_post_thumbnail($post->ID)) {
        
      $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'social-media');
      $img = $img_src[0];
      
      }

      if(has_excerpt()) {
      $excerpt = strip_tags($post->post_excerpt);
      $excerpt = str_replace("", "'", $excerpt);
      } else {
      $excerpt = get_bloginfo('description');
      }

    } elseif(is_archive() && ! is_search() && ! is_tax('resource-type')) {

      $title = get_the_archive_title();
      $excerpt = get_bloginfo('description');
      
    } elseif(is_tax('resource-type')) {
      
      $title = 'Resources: ' . get_the_archive_title();
      $excerpt = get_bloginfo('description');

    } elseif ( is_home() && ! is_front_page() ) {

      $title = single_post_title('',false);
      $excerpt = get_bloginfo('description');

    } elseif(is_search()) {

      $title = get_bloginfo('title') . ' search results for keyword ' . get_search_query();
      $excerpt = get_bloginfo('description');

    } else {

      $title = get_bloginfo('title');
      $excerpt = get_bloginfo('description');

    }

    ?>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="<?php echo $type; ?>"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img; ?>"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo the_permalink(); ?>" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:description" content="<?php echo $excerpt; ?>" />
    <meta name="twitter:image" content="<?php echo $img; ?>" />
   
    <?php
  }

  add_action('wp_head', 'blockhaus_opengraph', 10);