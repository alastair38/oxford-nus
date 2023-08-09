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

// Check rows exists.
if( have_rows('funder', 'option') ):?>

	<ul aria-label="Project funders and partners" class="flex gap-4 lg:gap-12 justify-center px-6 py-12 lg:w-3/4 mx-auto">
		<?php	// Loop through rows.
			while( have_rows('funder', 'option') ) : the_row();

					// Load sub field value.
					$logo_img = get_sub_field('logo');
					$name = get_sub_field('name');
					$url = get_sub_field('website');
			
					?>
					<li class="flex-1 flex flex-col gap-4 items-center justify-center">
						<a aria-label="<?php echo $name;?> website" class="flex-1" href="<?php echo $url;?>">
						<img loading="lazy" class="p-2 h-full" height='100' width='auto' src="<?php echo $logo_img['sizes']['thumbnail'];?>" alt="<?php echo $logo_img['alt'];?>"/>
					</a>
					</li>
					


				<?php // Do something...

			// End loop.
			endwhile; 
		else :
			// Do something...
		endif;

		?>
	</ul>
	
<div class="p-2 md:p-6 bg-contrast text-base">
	
	<div class="place-items-center grid grid-flow-row md:grid-flow-col auto-cols-fr gap-6 py-6 bg-contrast text-base ">
		
		<?php echo blockhaus_display_address();?>
		

  	<?php echo blockhaus_display_social_profiles();?>

		<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-1',
							'menu_id'        => 'footer-menu',
							'menu_class'		 => 'flex gap-2 md:gap-0 md:flex-col',
							'container'			 => 'nav',
							'container_aria_label'	=> 'footer menu',
						)
					);
		?>

		</div>
			<p class="text-center flex items-center justify-center gap-2 text-small pt-6">
				
			<svg
		aria-hidden="true"
	class="h-4 w-auto"
   width="379.41858mm"
   height="62.751244mm"
   viewBox="0 0 379.41858 62.751244"
   version="1.1"
   id="svg1"
   sodipodi:docname="Unnamed document 1"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <sodipodi:namedview
     id="namedview1"
     pagecolor="#ffffff"
     bordercolor="#eeeeee"
     borderopacity="1"
     inkscape:showpageshadow="0"
     inkscape:pageopacity="0"
     inkscape:pagecheckerboard="0"
     inkscape:deskcolor="#505050"
     inkscape:document-units="mm"
     showgrid="true">
    <inkscape:grid
       id="grid10"
       units="px"
       originx="-209.14116"
       originy="-237.78539"
       spacingx="0.26458333"
       spacingy="0.26458333"
       empcolor="#0099e5"
       empopacity="0.30196078"
       color="#0099e5"
       opacity="0.14901961"
       empspacing="5"
       dotted="false"
       gridanglex="30"
       gridanglez="30"
       visible="true" />
  </sodipodi:namedview>
  <defs
     id="defs1" />
  <g
     inkscape:label="Layer 1"
     inkscape:groupmode="layer"
     id="layer1"
     transform="translate(-55.335267,-62.914051)">
    <text
       xml:space="preserve"
       style="font-weight:bold;font-size:64.692px;line-height:0.8;font-family:'Gill Sans MT';-inkscape-font-specification:'Gill Sans MT Bold';fill:#00cfe3;fill-opacity:1;stroke-width:0.485191;stroke-linecap:round;stroke-linejoin:bevel"
       x="50.806824"
       y="111.43305"
       id="text1"
       inkscape:export-filename="logo_somatos.svg"
       inkscape:export-xdpi="96"
       inkscape:export-ydpi="96"><tspan
         sodipodi:role="line"
         id="tspan1"
         style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:'M+ 1mn';-inkscape-font-specification:'M+ 1mn';fill:#00cfe3;fill-opacity:1;stroke-width:0.485191"
         x="50.806824"
         y="111.43305">Somatosphere</tspan></text>
  </g>
</svg>
					<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html_e( ' &copy; ' . date("Y") , 'Blockhaus' ), 'Blockhaus' );
							?>
			</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
