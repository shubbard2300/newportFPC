<?php
/**
 * Newport FPC functions and definitions
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function newport_fpc_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'newport-fpc'),
        )
    );

    // Switch default core markup for search form, comment form, and comments
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'newport_fpc_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'newport_fpc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function newport_fpc_content_width() {
    $GLOBALS['content_width'] = apply_filters('newport_fpc_content_width', 640);
}
add_action('after_setup_theme', 'newport_fpc_content_width', 0);

/**
 * Register widget area.
 */
function newport_fpc_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'newport-fpc'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'newport-fpc'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'newport_fpc_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function newport_fpc_scripts() {
    wp_enqueue_style('newport-fpc-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('newport-fpc-style', 'rtl', 'replace');

    wp_enqueue_script('newport-fpc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'newport_fpc_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom post types for church-specific content
 */
function newport_fpc_custom_post_types() {
    // Sermons Post Type
    register_post_type('sermons', array(
        'labels' => array(
            'name' => 'Sermons',
            'singular_name' => 'Sermon',
            'add_new' => 'Add New Sermon',
            'add_new_item' => 'Add New Sermon',
            'edit_item' => 'Edit Sermon',
            'new_item' => 'New Sermon',
            'view_item' => 'View Sermon',
            'search_items' => 'Search Sermons',
            'not_found' => 'No sermons found',
            'not_found_in_trash' => 'No sermons found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-microphone',
        'rewrite' => array('slug' => 'sermons'),
    ));

    // Events Post Type
    register_post_type('events', array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new' => 'Add New Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'new_item' => 'New Event',
            'view_item' => 'View Event',
            'search_items' => 'Search Events',
            'not_found' => 'No events found',
            'not_found_in_trash' => 'No events found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-calendar-alt',
        'rewrite' => array('slug' => 'events'),
    ));
}
add_action('init', 'newport_fpc_custom_post_types');

/**
 * Add custom fields for events
 */
function newport_fpc_add_event_meta_boxes() {
    add_meta_box(
        'event-details',
        'Event Details',
        'newport_fpc_event_details_callback',
        'events',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'newport_fpc_add_event_meta_boxes');

function newport_fpc_event_details_callback($post) {
    wp_nonce_field('newport_fpc_save_event_details', 'newport_fpc_event_details_nonce');
    
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_time = get_post_meta($post->ID, '_event_time', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="event_date">Event Date:</label></th>';
    echo '<td><input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" /></td></tr>';
    echo '<tr><th><label for="event_time">Event Time:</label></th>';
    echo '<td><input type="time" id="event_time" name="event_time" value="' . esc_attr($event_time) . '" /></td></tr>';
    echo '<tr><th><label for="event_location">Location:</label></th>';
    echo '<td><input type="text" id="event_location" name="event_location" value="' . esc_attr($event_location) . '" size="50" /></td></tr>';
    echo '</table>';
}

function newport_fpc_save_event_details($post_id) {
    if (!isset($_POST['newport_fpc_event_details_nonce']) || !wp_verify_nonce($_POST['newport_fpc_event_details_nonce'], 'newport_fpc_save_event_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
    }

    if (isset($_POST['event_time'])) {
        update_post_meta($post_id, '_event_time', sanitize_text_field($_POST['event_time']));
    }

    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
    }
}
add_action('save_post', 'newport_fpc_save_event_details');
