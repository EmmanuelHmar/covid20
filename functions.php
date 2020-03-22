<?php

// Add scripts and stylesheets
function covid20_scripts()
{
    wp_enqueue_style('boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.4.1');
    wp_enqueue_style('blog', get_template_directory_uri() . '/css/blog.css');
    wp_enqueue_script('boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true);
}

add_action('wp_enqueue_scripts', 'covid20_scripts');

// Add Google Fonts
function covid20_google_fonts()
{
    wp_register_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap');
    wp_enqueue_style('OpenSans');
}

add_action('wp_print_styles', 'covid20_google_fonts');

// Wordpress Titles
add_theme_support('title-tag');

// Custom Settings
function custom_settings_add_menu()
{
    add_menu_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action('admin_menu', 'custom_settings_add_menu');

// Create Custom Global Settings
function custom_settings_page()
{ ?>
    <div class="wrap">
        <h1>Custom Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('section');
            do_settings_sections('theme-options');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

// Twitter
function setting_twitter()
{ ?>
    <input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" />
<?php
}

// Github
function setting_github()
{ ?>
    <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php
}

// Facebook
function setting_facebook()
{ ?>
    <input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
<?php
}

function custom_settings_page_setup()
{
    add_settings_section('section', 'All Settings', null, 'theme-options');

    add_settings_field('twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section');
    add_settings_field('github', 'Github URL', 'setting_github', 'theme-options', 'section');
    add_settings_field('facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section');

    register_setting('section', 'twitter');
    register_setting('section', 'github');
    register_setting('section', 'facebook');
}

add_action('admin_init', 'custom_settings_page_setup');

// Theme Featured Images

add_theme_support('post-thumbnails');

// Custom Post Types
function create_my_custom_post()
{
    register_post_type(
        'my-custom-post',
        array(
            'labels' => array(
                'name' => __('My Custom Post'),
                'singular_name' => __('My Custom Post'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
            )
        )
    );
}
add_action('init', 'create_my_custom_post');
