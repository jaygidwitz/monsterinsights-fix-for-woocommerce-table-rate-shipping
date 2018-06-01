<?php
/*
Plugin Name: MonsterInsights Fix for WooCommerce Table Rate Shipping
Plugin URI: 
Description: Fixes Conflict for WooCommerce Table Rate Shipping
Version: 1.0.0
Author: MonsterInsights Support Team
Author URI: https://www.monsterinsights.com
License: 
License URI: 
*/
function custom_monsterinsights_remove_conflicting_asset_files() {
	// Get current screen.
	$screen = get_current_screen();
	
	// Bail if we're not on a MonsterInsights screen.
	if ( empty( $screen->id ) || strpos( $screen->id, 'monsterinsights' ) === false ) {
		return;
	}
	
	$styles  = array();
	$scripts = array();

	$styles = array(
		'style', //
	);
	
	$scripts = array(
		'moment.js', //   Ecliqse Theme
	);

	if ( ! empty( $styles ) ) {
		foreach ( $styles as $style ) {
			wp_dequeue_style( $style ); // Remove CSS file from MI screen
			wp_deregister_style( $style );
		}
	}
	if ( ! empty( $scripts ) ) {
		foreach ( $scripts as $script ) {
			wp_dequeue_script( $script ); // Remove JS file from MI screen
			wp_deregister_script( $script );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'custom_monsterinsights_remove_conflicting_asset_files', 9998 );