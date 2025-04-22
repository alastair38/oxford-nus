<?php
/**
 * Template part for displaying login form / logout button
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<?php

		$args = array(
			'id_username' => 'user',
			'id_password' => 'pass',
		);

		if( !is_user_logged_in() ) {

			wp_login_form( $args );?>
			
			<div class="flex gap-6 items-center justify-center py-12">
				
				<a class="password-reset underline hover:no-underline focus-visible:no-underline decoration-1" href="<?php echo wp_lostpassword_url( );?>" title="Lost Password">
					<?php esc_html_e( 'Click this link to reset your password', 'blockhaus' );?>
				</a>
				
			</div>
			
		<?php } else {

			$current_user = wp_get_current_user();?>
		
			<div class="flex flex-col gap-6 items-center justify-center py-12">
				
				<p><?php esc_html_e( "Hi, $current_user->display_name ", 'blockhaus' );?></p>
				
				<a class="rounded-md inline-block w-fit bg-contrast text-white px-6 py-2 ring-1 ring-offset-2 ring-transparent duration-200 hover:ring-contrast focus:ring-contrast" href="<?php echo esc_url( wp_logout_url() );?>">
					<?php esc_html_e( 'Logout', 'blockhaus' );?>
				</a>
				
			</div>
			
		<?php } ?>