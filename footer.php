<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blockhaus
 */

?>

			<footer class="mt-12 md:mt-24 text-sm">

			<?php 
				
				if(function_exists('get_field')):
					
				if( have_rows('funder', 'option') ):?>

				<ul aria-label="Project funders and partners" class="flex gap-4 lg:gap-12 justify-center px-6 py-12 lg:w-3/4 mx-auto">
					<?php	// Loop through rows.
						while( have_rows('funder', 'option') ) : the_row();

									// Load sub field value.
						$logo_img = get_sub_field('logo');
						$name = get_sub_field('name');
						$url = get_sub_field('website');?>
						
						<li class="flex-1 flex flex-col gap-4 items-center justify-center">
							<a aria-label="<?php echo $name;?> website" class="flex-1 flex items-center" href="<?php echo $url;?>">
											
								<?php if($logo_img):?>
									<img loading="lazy" class="p-2 h-full" height='100' width='auto' src="<?php echo $logo_img['sizes']['thumbnail'];?>" alt="<?php echo $logo_img['alt'];?>"/>
									
								<?php	else: ?>
									<span><?php echo $name;?></span>
								<?php endif;?>
								
							</a>
						</li>

						<?php
								// End loop.
						endwhile; 
						else :
								// Do something...
						endif;?>
					
				</ul>
				
				<?php endif;?>
					
				<div class="p-2 md:p-6 bg-contrast text-base">
		
					<div class="place-items-center grid grid-flow-row md:grid-flow-col auto-cols-fr gap-6 py-6 bg-contrast text-base ">
			
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-1',
									'menu_id'        => 'footer-menu',
									'menu_class'		 => 'flex gap-6',
									'container'			 => 'nav',
									'container_aria_label'	=> 'footer menu',
									)
								);
							?>

					</div>
						
					<p class="text-center flex flex-col items-center justify-center gap-6 text-small pt-6">
						<img class="h-10" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo-white.webp" width="180" height="40" alt="Oxford-NUS Centre for Neuroethics and Society logo">
							<?php
										/* translators: 1: Theme name, 2: Theme author. */
								printf( esc_html_e( ' &copy; ' . date("Y") , 'Blockhaus' ), 'Blockhaus' );
							?>
					</p>
				
				</div>
		
			</footer>
			
		</div><!-- #page-blockhaus -->

		<?php wp_footer(); ?>

	</body>
	
</html>
