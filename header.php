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

	<!-- <link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest"> -->
	
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page-blockhaus" class="flex flex-col">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'blockhaus' ); ?></a>

	<header id="masthead" class="main-header bg-neutral-light-100 md:bg-base top-0 left-0 right-0 z-50 p-3 flex flex-col lg:p-6">
		<div class="flex justify-between items-center">
		<div class="flex items-center gap-2">

			<a class="logo flex gap-2 items-center" aria-label="Home page" rel="home" href="/">
			
<img class="h-8 md:h-10 xl:h-16 object-contain" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.webp" width="100%" height="64" alt="Oxford-NUS Centre for Neuroethics and Society logo">

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
					'menu_class'		 => 'flex flex-col lg:leading-none text-2xl lg:text-contrast lg:flex-row absolute lg:relative left-0 right-0 top-0 -z-10 lg:z-0 bg-gray-100 -translate-y-full lg:translate-y-0 invisible lg:visible lg:bg-transparent gap-4 h-screen lg:h-auto justify-center items-center ml-auto ease-in-out duration-200'
				)
			);
			?>
		
		</nav><!-- #site-navigation -->
		
		

    
<?php if( is_user_logged_in() ) {

echo '<div class="flex fixed bottom-4 left-4 w-fit gap-2 z-50 items-center justify-center">';

  blockhaus_post_edit_link();
  
  blockhaus_admin_link();

  blockhaus_logout_link();

echo '</div>';
}?>

</div>
	</header><!-- #masthead -->
