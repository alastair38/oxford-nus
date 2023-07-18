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

			<a class="logo h-4 md:h-12 flex gap-2" aria-label="Home page" rel="home" href="/">
			
			<figure class="aspect-square rounded-full bg-gray-100 flex items-center justify-center">
			<img class="logo h-4 md:h-12 p-1" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/man.webp" alt="">
		</figure>
				
			<svg class="text-gray-500" aria-label="Somatosphere" viewBox="295.111 83.435 1109.499 174.759"  xmlns="http://www.w3.org/2000/svg">
  <g transform="matrix(13.932672, 0, 0, 13.932672, -2988.360241, -2547.427377)">
    <path d="M 238.838 198.558 Q 237.737 198.558 236.985 198.109 Q 236.233 197.659 235.919 196.851 L 237.374 196.326 Q 237.515 196.811 237.904 197.043 Q 238.293 197.275 238.848 197.275 Q 239.141 197.275 239.414 197.21 Q 239.687 197.144 239.869 196.988 Q 240.05 196.831 240.05 196.568 Q 240.05 196.215 239.707 196.018 Q 239.364 195.821 238.818 195.72 L 238 195.558 Q 237.455 195.447 236.985 195.22 Q 236.515 194.993 236.233 194.614 Q 235.95 194.235 235.95 193.66 Q 235.95 193.114 236.202 192.72 Q 236.455 192.326 236.874 192.074 Q 237.293 191.821 237.798 191.695 Q 238.303 191.569 238.808 191.569 Q 239.353 191.569 239.864 191.72 Q 240.374 191.872 240.778 192.19 Q 241.182 192.508 241.394 193.033 L 239.949 193.559 Q 239.818 193.215 239.48 193.033 Q 239.141 192.852 238.667 192.852 Q 238.202 192.852 237.894 193.018 Q 237.586 193.185 237.586 193.498 Q 237.586 193.751 237.798 193.932 Q 238.01 194.114 238.354 194.185 L 239.263 194.367 Q 239.677 194.447 240.101 194.574 Q 240.525 194.7 240.884 194.907 Q 241.242 195.114 241.464 195.457 Q 241.687 195.801 241.687 196.326 Q 241.687 196.861 241.439 197.281 Q 241.192 197.7 240.783 197.982 Q 240.374 198.265 239.869 198.412 Q 239.364 198.558 238.838 198.558 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 245.767 198.558 Q 244.737 198.558 243.949 198.124 Q 243.161 197.69 242.717 196.902 Q 242.272 196.114 242.272 195.064 Q 242.272 194.013 242.717 193.225 Q 243.161 192.438 243.949 192.003 Q 244.737 191.569 245.767 191.569 Q 246.807 191.569 247.595 192.003 Q 248.383 192.438 248.832 193.225 Q 249.282 194.013 249.282 195.064 Q 249.282 196.114 248.832 196.902 Q 248.383 197.69 247.595 198.124 Q 246.807 198.558 245.767 198.558 Z M 245.767 197.245 Q 246.262 197.245 246.676 196.998 Q 247.09 196.75 247.337 196.265 Q 247.585 195.781 247.585 195.064 Q 247.585 194.346 247.337 193.862 Q 247.09 193.377 246.676 193.129 Q 246.262 192.882 245.767 192.882 Q 245.282 192.882 244.868 193.129 Q 244.454 193.377 244.206 193.862 Q 243.959 194.346 243.959 195.064 Q 243.959 195.781 244.206 196.265 Q 244.454 196.75 244.868 196.998 Q 245.282 197.245 245.767 197.245 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 250.079 198.437 L 250.079 191.69 L 252.473 191.69 L 253.877 196.528 L 255.301 191.69 L 257.695 191.69 L 257.695 198.437 L 256.139 198.437 L 256.139 193.134 L 254.533 198.437 L 253.22 198.437 L 251.625 193.134 L 251.625 198.437 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 258.189 198.437 L 260.745 191.69 L 262.502 191.69 L 265.057 198.437 L 263.32 198.437 L 262.916 197.235 L 260.33 197.235 L 259.926 198.437 Z M 260.765 195.942 L 262.482 195.942 L 261.613 193.377 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 266.765 198.437 L 266.765 193.094 L 264.593 193.094 L 264.593 191.69 L 270.522 191.69 L 270.522 193.094 L 268.35 193.094 L 268.35 198.437 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 274.137 198.558 Q 273.107 198.558 272.319 198.124 Q 271.531 197.69 271.087 196.902 Q 270.642 196.114 270.642 195.064 Q 270.642 194.013 271.087 193.225 Q 271.531 192.438 272.319 192.003 Q 273.107 191.569 274.137 191.569 Q 275.177 191.569 275.965 192.003 Q 276.753 192.438 277.202 193.225 Q 277.652 194.013 277.652 195.064 Q 277.652 196.114 277.202 196.902 Q 276.753 197.69 275.965 198.124 Q 275.177 198.558 274.137 198.558 Z M 274.137 197.245 Q 274.632 197.245 275.046 196.998 Q 275.46 196.75 275.707 196.265 Q 275.955 195.781 275.955 195.064 Q 275.955 194.346 275.707 193.862 Q 275.46 193.377 275.046 193.129 Q 274.632 192.882 274.137 192.882 Q 273.652 192.882 273.238 193.129 Q 272.824 193.377 272.576 193.862 Q 272.329 194.346 272.329 195.064 Q 272.329 195.781 272.576 196.265 Q 272.824 196.75 273.238 196.998 Q 273.652 197.245 274.137 197.245 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 280.885 198.558 Q 280.35 198.558 279.845 198.386 Q 279.34 198.215 278.951 197.856 Q 278.562 197.498 278.37 196.952 L 279.289 196.7 Q 279.481 197.245 279.961 197.503 Q 280.441 197.76 280.966 197.76 Q 281.36 197.76 281.713 197.624 Q 282.067 197.488 282.289 197.22 Q 282.511 196.952 282.511 196.579 Q 282.511 196.215 282.314 195.998 Q 282.117 195.781 281.794 195.639 Q 281.471 195.498 281.087 195.387 Q 280.703 195.276 280.315 195.144 Q 279.926 195.013 279.603 194.811 Q 279.279 194.609 279.082 194.281 Q 278.885 193.953 278.885 193.437 Q 278.885 192.811 279.234 192.397 Q 279.582 191.983 280.128 191.776 Q 280.673 191.569 281.279 191.569 Q 281.774 191.569 282.249 191.71 Q 282.723 191.852 283.102 192.13 Q 283.481 192.407 283.673 192.831 L 282.744 193.094 Q 282.562 192.741 282.133 192.554 Q 281.703 192.367 281.239 192.367 Q 280.875 192.367 280.557 192.478 Q 280.239 192.589 280.042 192.821 Q 279.845 193.054 279.845 193.407 Q 279.845 193.74 280.042 193.953 Q 280.239 194.165 280.567 194.301 Q 280.895 194.437 281.284 194.548 Q 281.673 194.66 282.062 194.796 Q 282.451 194.932 282.779 195.134 Q 283.107 195.336 283.304 195.649 Q 283.501 195.962 283.501 196.447 Q 283.501 196.952 283.279 197.346 Q 283.057 197.74 282.683 198.008 Q 282.309 198.275 281.845 198.417 Q 281.38 198.558 280.885 198.558 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 284.299 198.437 L 285.733 191.69 L 287.611 191.69 Q 288.046 191.69 288.505 191.746 Q 288.965 191.801 289.354 191.978 Q 289.742 192.155 289.985 192.498 Q 290.227 192.842 290.227 193.417 Q 290.227 194.296 289.828 194.811 Q 289.429 195.326 288.717 195.543 Q 288.005 195.76 287.056 195.76 L 285.834 195.76 L 285.268 198.437 Z M 286.016 194.942 L 287.298 194.942 Q 287.894 194.942 288.328 194.811 Q 288.763 194.68 289 194.367 Q 289.237 194.054 289.237 193.508 Q 289.237 192.902 288.818 192.7 Q 288.399 192.498 287.702 192.498 L 286.531 192.498 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 290.328 198.437 L 291.762 191.69 L 292.732 191.69 L 292.126 194.559 L 295.661 194.559 L 296.267 191.69 L 297.236 191.69 L 295.802 198.437 L 294.832 198.437 L 295.479 195.367 L 291.954 195.367 L 291.297 198.437 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 297.338 198.437 L 298.772 191.69 L 303.368 191.69 L 303.196 192.508 L 299.57 192.508 L 299.136 194.559 L 301.812 194.559 L 301.63 195.367 L 298.964 195.367 L 298.479 197.619 L 302.105 197.619 L 301.933 198.437 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 303.044 198.437 L 304.478 191.69 L 306.539 191.69 Q 307.276 191.69 307.821 191.842 Q 308.367 191.993 308.67 192.347 Q 308.973 192.7 308.973 193.306 Q 308.973 194.316 308.352 194.872 Q 307.731 195.427 306.65 195.528 L 308.135 198.437 L 307.074 198.437 L 305.63 195.599 L 304.62 195.599 L 304.014 198.437 Z M 304.791 194.801 L 306.044 194.801 Q 306.62 194.801 307.059 194.69 Q 307.498 194.579 307.741 194.286 Q 307.983 193.993 307.983 193.437 Q 307.983 192.872 307.574 192.685 Q 307.165 192.498 306.458 192.498 L 305.276 192.498 Z" style="fill: currentColor; white-space: pre;"/>
    <path d="M 309.205 198.437 L 310.64 191.69 L 315.235 191.69 L 315.063 192.508 L 311.437 192.508 L 311.003 194.559 L 313.68 194.559 L 313.498 195.367 L 310.831 195.367 L 310.347 197.619 L 313.973 197.619 L 313.801 198.437 Z" style="fill: currentColor; white-space: pre;"/>
  </g>
</svg>
			</a>

   
				<!-- <span class="text-xl font-black absolute lg:relative w-1/2 ml-[25%] text-center lg:w-auto lg:ml-auto"><a class="text-offset" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> -->
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation flex gap-0 lg:gap-6 selfend items-center py-2 h-10 lg:px-6 overflow-hidden">
		
			<button class="menu-toggle text-sm flex items-center gap-1 font-sans lg:hidden font-bold uppercase aspect-square rounded-full px-2" aria-controls="primary-menu" aria-expanded="false"><span id="mobile-menu-text" class="sr-only"><?php esc_html_e( 'Menu', 'blockhaus' ); ?></span><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
</svg></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'		 => 'flex flex-col lg:leading-none text-2xl lg:text-contrast lg:flex-row absolute lg:relative left-0 right-0 top-0 -z-10 lg:z-0 bg-gray-100 -translate-y-full lg:translate-y-0 invisible lg:visible lg:bg-transparent gap-4 lg:gap-6 h-screen lg:h-auto justify-center items-center ml-auto ease-in-out duration-200'
				)
			);
			?>
		<div class=""><?php echo blockhaus_custom_form();?> </div>
		</nav><!-- #site-navigation -->
		
		

    
<?php if( is_user_logged_in() ) {

echo '<div class="flex flex-col fixed bottom-0 top-0 right-4 w-fit gap-2 z-50 items-center justify-center">';

  blockhaus_post_edit_link();
  
  blockhaus_admin_link();

  blockhaus_logout_link();

echo '</div>';
}?>

</div>
	</header><!-- #masthead -->
