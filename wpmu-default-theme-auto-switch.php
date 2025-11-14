<?php
/**
 * Plugin Name:       WPMU Default Theme Auto Switch
 * Description:       Automatically switch to the default theme on a multisite installation if current activated theme is missing.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            CTLT WordPress
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpmu-default-theme-auto-switch
 *
 * @package           wpmu-default-theme-auto-switch
 */

namespace UBC\CTLT\MU\DEFAULT_THEME_AUTO_SWITCH;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Initializes the plugin.
 *
 * @return void
 */
function init() {
	// Check if current activated theme file is missing.
	if ( ( ! file_exists( get_stylesheet_directory() . '/style.css' ) && defined( 'WP_DEFAULT_THEME' ) ) ) {
		// Switch to the default theme.
		switch_theme( constant( 'WP_DEFAULT_THEME' ) );
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\init' );
