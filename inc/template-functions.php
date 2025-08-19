<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newport_fpc_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'newport_fpc_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newport_fpc_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'newport_fpc_pingback_header');

/**
 * Customize excerpt length
 */
function newport_fpc_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'newport_fpc_excerpt_length');

/**
 * Customize excerpt more text
 */
function newport_fpc_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'newport_fpc_excerpt_more');

/**
 * Add custom image sizes
 */
function newport_fpc_custom_image_sizes() {
    add_image_size('newport-featured', 800, 400, true);
    add_image_size('newport-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'newport_fpc_custom_image_sizes');

/**
 * Enqueue Google Fonts
 */
function newport_fpc_google_fonts() {
    wp_enqueue_style('newport-fpc-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'newport_fpc_google_fonts');

/**
 * Custom logo setup
 */
function newport_fpc_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'newport_fpc_custom_logo_setup');

/**
 * Display custom logo
 */
function newport_fpc_the_custom_logo() {
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

/**
 * Add support for wide and full width blocks
 */
function newport_fpc_gutenberg_support() {
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'newport_fpc_gutenberg_support');

/**
 * Enqueue block editor styles
 */
function newport_fpc_block_editor_styles() {
    wp_enqueue_style('newport-fpc-block-editor-styles', get_template_directory_uri() . '/assets/css/block-editor-styles.css', array(), '1.0');
}
add_action('enqueue_block_editor_assets', 'newport_fpc_block_editor_styles');

/**
 * Custom comment form
 */
function newport_fpc_comment_form($args) {
    $args['comment_field'] = '<p class="comment-form-comment">
        <label for="comment">' . _x('Comment', 'noun', 'newport-fpc') . '</label>
        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
    </p>';
    
    return $args;
}
add_filter('comment_form_defaults', 'newport_fpc_comment_form');

/**
 * Filter the "read more" excerpt string link to the post.
 */
function newport_fpc_new_excerpt_more($more) {
    if (!is_admin()) {
        global $post;
        return ' <a class="read-more-link" href="'. esc_url(get_permalink($post->ID)) . '">' . __('Read More &raquo;', 'newport-fpc') . '</a>';
    }
    return $more;
}
add_filter('excerpt_more', 'newport_fpc_new_excerpt_more');

/**
 * Add theme support for post formats
 */
function newport_fpc_post_formats() {
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'quote',
        'image',
        'video'
    ));
}
add_action('after_setup_theme', 'newport_fpc_post_formats');
