<?php
/**
 * Force 'soledad' translations to (re)load at init to avoid WP 6.7 early-load notice.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// If something loaded 'soledad' too early, unload it and reload at init.
add_action( 'init', function () {
	// Point to languages in wp-content/languages/themes first (preferred by WP core),
	// falls back to theme /languages as needed.
	$theme_lang_dir = WP_LANG_DIR . '/themes';
	$alt_lang_dir   = get_template_directory() . '/languages';

	// If already loaded too early, drop it to avoid the notice.
	unload_textdomain( 'soledad' );

	// Try core’s languages dir first (JIT model), then theme folder.
	load_textdomain( 'soledad', "{$theme_lang_dir}/soledad-" . determine_locale() . ".mo" );
	load_theme_textdomain( 'soledad', $alt_lang_dir );
}, 20);
