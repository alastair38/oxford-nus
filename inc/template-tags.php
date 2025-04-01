<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blockhaus
 */

if ( ! function_exists( 'blockhaus_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blockhaus_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		// <time class="updated" datetime="%3$s">%4$s</time>

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'blockhaus' ),
			 $time_string
		);

		echo '<span class="posted-on italic">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'blockhaus_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blockhaus_posted_by($post) {
	
		echo '<span>' . get_the_author() . '</span>';

	}
endif;

if ( ! function_exists( 'blockhaus_projects_team' ) ) :
	
	function blockhaus_projects_team($peopleObj) {
		
		if(! empty($peopleObj['people'])):
		$people = $peopleObj['people'];
		$title = $peopleObj['title'];
		

		?>
		<div class="space-y-3">
			<span class="font-black flex border-b border-neutral-light-900"><?php esc_html_e( $title, 'blockhaus' );?></span>
			
			<ul class="flex gap-x-6 gap-y-2 flex-col">

				<?php 
				
				
				
				foreach( $people as $post ): 
						
					// Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); 
					$disable_page_link = get_field('disable_biography_page', $post->ID);
					?>
					<li>
						
						<?php 
						
						if(!$disable_page_link):?>
						<a class="flex gap-2 hover:underline focus-visible:underline items-center" href="<?php echo get_the_permalink($post->ID);?>">
						<?php echo get_the_post_thumbnail($post->ID, 'thumbnail', ['class' => 'rounded-full w-10 h-10'] ); 
						echo get_the_title($post->ID); ?>	
						</a>
						
						<?php else:?>
							<span class="flex gap-2 items-center">
						<?php echo get_the_post_thumbnail($post->ID, 'thumbnail', ['class' => 'rounded-full w-10 h-10'] ); 
						echo get_the_title($post->ID); ?>	
						</span>
						
						<?php endif;
						?>
					</li>
					
				<?php endforeach; ?>
				
			</ul>
		</div>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); 
		
				endif;
	}
	
endif;

if ( ! function_exists( 'blockhaus_grant_details' ) ) :

endif;

/**
 * 
 * 
 * Sort contributer taxonomy by term_order
 *
 * @param array $terms array of objects to be replaced with sorted list
 * @param integer $id post id
 * @param string $taxonomy only 'post_tag' is changed.
 * @return array of objects
 */
function plugin_get_the_ordered_terms ( $terms, $id, $taxonomy ) {
	if ( 'contributor' != $taxonomy ) // only ordering tags for now but could add other taxonomies here.
			return $terms;

	$terms = wp_cache_get($id, "{$taxonomy}_relationships_sorted");
	if ( false === $terms ) {
			$terms = wp_get_object_terms( $id, $taxonomy, array( 'orderby' => 'term_order' ) );
			wp_cache_add($id, $terms, $taxonomy . '_relationships_sorted');
	}

	return $terms;
}

add_filter( 'get_the_terms', 'plugin_get_the_ordered_terms' , 10, 4 );

// hides taxonomies in Gutenberg if 'No Meta Box' is used when registering 

add_filter( 'rest_prepare_taxonomy', function( $response, $taxonomy, $request ) {
	$context = ! empty( $request['context'] ) ? $request['context'] : 'view';
	// Context is edit in the editor
	if( $context === 'edit' && $taxonomy->meta_box_cb === false ){
			$data_response = $response->get_data();
			$data_response['visibility']['show_ui'] = false;
			$response->set_data( $data_response );
	}
	return $response;
}, 10, 3 );

if ( ! function_exists( 'blockhaus_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blockhaus_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'blockhaus' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'blockhaus' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'blockhaus' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'blockhaus' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'blockhaus' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link ml-auto border px-3 py-1 rounded-full has-small-font-size">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'blockhaus_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blockhaus_post_thumbnail($size) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail h-full">
				<?php the_post_thumbnail( $size, array( 'class' => 'aspect-video h-full w-full object-cover rounded-md' ) ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

				<?php
					the_post_thumbnail(
						$size,
						array(
							'class' => 'w-full object-cover rounded-md',
							'alt' => the_title_attribute(
								array(
									
									'echo' => false,
								)
							),
						)
					);
				?>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

function blockhaus_get_custom_post_types() {

	$args = array(
		 'public'   => true,
		// '_builtin' => true
	 );

	$output = 'objects'; // 'names' or 'objects' (default: 'names')
	$operator = 'and'; // 'and' or 'or' (default: 'and')
		
	$post_types = get_post_types( $args, $output, $operator );

	return $post_types;
}

function blockhaus_display_address() {
	
	$addressObject = get_field('address', 'options');
	$first_line = $addressObject['first_line'];
	$second_line = $addressObject['second_line'];
	$town_city = $addressObject['city'];
	$region = $addressObject['region'];
	$postcode = $addressObject['postcode'];
	
	$phoneNumbers = get_field('phone_numbers', 'options');
	$mobile = $phoneNumbers['mobile'];
	$mobile_numeric = preg_replace( '/\D/', '', $mobile ); // remove spaces etc from the mobile string

	$address = '<address aria-label="Contact address" class="blockhaus-address text-center md:text-left w-1/3 flex flex-col">';
	$address .= $first_line ? '<span>' . $first_line . '</span>' : ''; 
	$address .= $second_line ? '<span>' . $second_line . '</span>' : ''; 
	$address .= $town_city ? '<span>' . $town_city . '</span>' : ''; 
	$address .= $region ? '<span>' . $region . '</span>' : ''; 
	$address .= $postcode ? '<span>' . $postcode . '</span>' : '';
	$address .= $mobile ? '<a href="tel:+' . $mobile_numeric . '">Tel: ' . $mobile . '</a>' : '';
	$address .= '</address>';

	return $address;
}

function blockhaus_post_edit_link()  {

		$page_id = get_queried_object_id();
		
		if(current_user_can( 'edit_post', $page_id ) && !is_post_type_archive()):
		echo '<a class="flex gap-2 relative group items-center p-2 bg-neutral-light-100 hover:bg-neutral-light-500 focus:bg-neutral-light-500 rounded-full border border-current" href="' . esc_url( get_edit_post_link($page_id) ) . '">
		<svg class="w-5 h-5"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#pencil" /></svg>
		<span class="flex rounded-md text-sm sr-only group-hover:px-2 group-hover:py-1 py-1 px-2 group-hover:rounded-sm group-hover:not-sr-only group-hover:absolute right-16 group-hover:w-max bg-neutral-dark-900 text-neutral-light-100">Edit this page</span>
		</a>';
		endif;

}

function blockhaus_admin_link() {
	
	if( is_user_logged_in() ):
	echo '<a class="flex gap-2 relative group items-center p-2 aspect-square bg-neutral-light-100 hover:bg-neutral-light-500 focus:bg-neutral-light-500 rounded-full border border-current" href="' . admin_url() . '">
	<svg class="w-5 h-5"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#settings" /></svg>
	<span class="flex rounded-md text-sm sr-only group-hover:px-2 group-hover:py-1 py-1 px-2 group-hover:rounded-sm group-hover:not-sr-only group-hover:absolute right-16 group-hover:w-max bg-neutral-dark-900 text-neutral-light-100">Admin</span>
	</a>';
	endif;

}

function blockhaus_logout_link() {

	if( is_user_logged_in() ):
	echo '<a class="flex gap-2 relative group items-center p-2 bg-neutral-light-100 hover:bg-neutral-light-500 focus:bg-neutral-light-500 rounded-full border border-current" href="' . esc_url( wp_logout_url() ) . '">
	<svg class="w-5 h-5"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#logout" /></svg>
	<span class="flex rounded-md text-sm sr-only group-hover:px-2 group-hover:py-1 py-1 px-2 group-hover:rounded-sm group-hover:not-sr-only group-hover:absolute right-16 group-hover:w-max bg-neutral-dark-900 text-neutral-light-100">Logout</span>
	</a>';
	endif;

}

function blockhaus_header_layout() {

	$header = new stdClass;
	$post_type = get_post_type();

	if(is_archive() && ! is_search() && ! is_tax('resource-type')):

		$header->title = get_the_archive_title();

	elseif ( is_home() && ! is_front_page() ):

		$header->title = single_post_title('',false);
		
	elseif ( is_tax('resource-type') ):

		$header->title = 'Resources: ' . get_the_archive_title();

	elseif (is_search()):

		$header->title = 	'<span class="underline decoration-accent-secondary decoration-4">Search results for: ' . get_search_query() . '</span>';
	
	else:

		$header->title = get_the_title();

	endif;


	return $header;
}
