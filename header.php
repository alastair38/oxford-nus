<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blockhaus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page-blockhaus" class="flex flex-col">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'blockhaus' ); ?></a>

	<header id="masthead" class="main-header bg-neutral-light-100 md:bg-base top-0 left-0 right-0 z-50 p-2 flex flex-col lg:p-6">
		<div class="flex justify-between items-center">
		<div class="flex items-center gap-2">

			<a class="logo h-4 md:h-12 flex gap-2 items-center" aria-label="Home page" rel="home" href="/">
			
			<figure class="aspect-square flex items-center justify-center">
			<img class="logo h-4 md:h-12 p-1" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/man.webp" alt="">
		</figure>
				
		<svg
		aria-hidden="true"
	class="h-8 w-auto"
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


			</a>

   
				<!-- <span class="text-xl font-black absolute lg:relative w-1/2 ml-[25%] text-center lg:w-auto lg:ml-auto"><a class="text-offset" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> -->
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation flex gap-0 lg:gap-6 selfend items-center py-2 h-10 lg:px-6 overflow-hidden">
		
			<button class="menu-toggle text-sm flex items-center gap-1 font-sans lg:hidden font-bold uppercase aspect-square rounded-full px-2" aria-controls="primary-menu" aria-expanded="false">
				<span id="mobile-menu-text" class="sr-only"><?php esc_html_e( 'Menu', 'blockhaus' ); ?></span>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
				</svg>
			</button>
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'		 => 'flex flex-col lg:leading-none text-2xl lg:text-contrast lg:flex-row absolute lg:relative left-0 right-0 top-0 -z-10 lg:z-0 bg-gray-100 -translate-y-full lg:translate-y-0 invisible lg:visible lg:bg-transparent gap-4 lg:gap-6 h-screen lg:h-auto justify-center items-center ml-auto ease-in-out duration-200'
				)
			);
			?>
		
		</nav><!-- #site-navigation -->
		
		

    
<?php if( is_user_logged_in() ) {

echo '<div class="flex flex-col fixed bottom-0 top-0 left-4 w-fit gap-2 z-50 items-center justify-center">';

  blockhaus_post_edit_link();
  
  blockhaus_admin_link();

  blockhaus_logout_link();

echo '</div>';
}?>

</div>
	</header><!-- #masthead -->
