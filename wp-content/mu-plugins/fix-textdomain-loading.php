<?php
/**
 * Plugin Name: Fix Early Textdomain Loading
 * Description: Delays textdomain loading until init to avoid _load_textdomain_just_in_time warning.
 */

add_action('init', function () {
    load_plugin_textdomain('give', false, 'give/languages');
});
