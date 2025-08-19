<?php
/**
 * Newport FPC Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newport_fpc_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'newport_fpc_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'newport_fpc_customize_partial_blogdescription',
            )
        );
    }

    // Church Information Section
    $wp_customize->add_section('newport_fpc_church_info', array(
        'title'    => __('Church Information', 'newport-fpc'),
        'priority' => 30,
    ));

    // Church Address
    $wp_customize->add_setting('newport_fpc_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('newport_fpc_address', array(
        'label'    => __('Church Address', 'newport-fpc'),
        'section'  => 'newport_fpc_church_info',
        'type'     => 'textarea',
    ));

    // Church Phone
    $wp_customize->add_setting('newport_fpc_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('newport_fpc_phone', array(
        'label'   => __('Church Phone', 'newport-fpc'),
        'section' => 'newport_fpc_church_info',
        'type'    => 'text',
    ));

    // Church Email
    $wp_customize->add_setting('newport_fpc_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('newport_fpc_email', array(
        'label'   => __('Church Email', 'newport-fpc'),
        'section' => 'newport_fpc_church_info',
        'type'    => 'email',
    ));

    // Service Times Section
    $wp_customize->add_section('newport_fpc_service_times', array(
        'title'    => __('Service Times', 'newport-fpc'),
        'priority' => 35,
    ));

    // Sunday Service Time
    $wp_customize->add_setting('newport_fpc_sunday_service', array(
        'default'           => '10:00 AM',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('newport_fpc_sunday_service', array(
        'label'   => __('Sunday Service Time', 'newport-fpc'),
        'section' => 'newport_fpc_service_times',
        'type'    => 'text',
    ));

    // Wednesday Service Time
    $wp_customize->add_setting('newport_fpc_wednesday_service', array(
        'default'           => '7:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('newport_fpc_wednesday_service', array(
        'label'   => __('Wednesday Service Time', 'newport-fpc'),
        'section' => 'newport_fpc_service_times',
        'type'    => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('newport_fpc_social_media', array(
        'title'    => __('Social Media', 'newport-fpc'),
        'priority' => 40,
    ));

    // Facebook URL
    $wp_customize->add_setting('newport_fpc_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('newport_fpc_facebook', array(
        'label'   => __('Facebook URL', 'newport-fpc'),
        'section' => 'newport_fpc_social_media',
        'type'    => 'url',
    ));

    // Instagram URL
    $wp_customize->add_setting('newport_fpc_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('newport_fpc_instagram', array(
        'label'   => __('Instagram URL', 'newport-fpc'),
        'section' => 'newport_fpc_social_media',
        'type'    => 'url',
    ));

    // YouTube URL
    $wp_customize->add_setting('newport_fpc_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('newport_fpc_youtube', array(
        'label'   => __('YouTube URL', 'newport-fpc'),
        'section' => 'newport_fpc_social_media',
        'type'    => 'url',
    ));

    // Theme Colors Section
    $wp_customize->add_section('newport_fpc_colors', array(
        'title'    => __('Theme Colors', 'newport-fpc'),
        'priority' => 45,
    ));

    // Primary Color
    $wp_customize->add_setting('newport_fpc_primary_color', array(
        'default'           => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'newport_fpc_primary_color', array(
        'label'   => __('Primary Color', 'newport-fpc'),
        'section' => 'newport_fpc_colors',
    )));

    // Accent Color
    $wp_customize->add_setting('newport_fpc_accent_color', array(
        'default'           => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'newport_fpc_accent_color', array(
        'label'   => __('Accent Color', 'newport-fpc'),
        'section' => 'newport_fpc_colors',
    )));
}
add_action('customize_register', 'newport_fpc_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newport_fpc_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newport_fpc_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newport_fpc_customize_preview_js() {
    wp_enqueue_script('newport-fpc-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'newport_fpc_customize_preview_js');

/**
 * Output custom CSS for theme customizer options
 */
function newport_fpc_customizer_css() {
    $primary_color = get_theme_mod('newport_fpc_primary_color', '#2c3e50');
    $accent_color = get_theme_mod('newport_fpc_accent_color', '#3498db');
    
    ?>
    <style type="text/css">
        .site-header,
        .site-footer {
            background-color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .main-navigation {
            background-color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .read-more,
        .entry-title a:hover {
            color: <?php echo esc_attr($accent_color); ?>;
        }
        
        .read-more {
            background-color: <?php echo esc_attr($accent_color); ?>;
        }
        
        .nav-menu a:hover {
            background-color: <?php echo esc_attr($primary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'newport_fpc_customizer_css');
