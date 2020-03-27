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

function create_post_your_post(){
    register_post_type('your_post',
    array(
        'labels' => array(
            'name' => __('Your Post'),
        ),
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ),
        'taxonomies' => array(
            'post_tag',
            'category',
        )
        )
        );
        register_taxonomy_for_object_type('category','your_post');
        register_taxonomy_for_object_type('post_tag','your_post');
}

add_action('init', 'create_post_your_post');


function add_your_fields_meta_box(){
    add_meta_box(
        'your_fields_meta_box', //$id
        'Your Fields', //$title
        'show_your_fields_meta_box', //$callback
        'your_post', //$screen
        'normal', //$conteXt
        'high' //$priority
    );
}

add_action('add_meta_boxes', 'add_your_fields_meta_box');

function show_your_fields_meta_box(){
    global $post;

    $meta = get_post_meta($post->ID, 'your_fields', true); ?>

    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">

    <!-- All fields will go here -->

    <?php
}

function save_your_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }

    $old = get_post_meta( $post_id, 'your_fields', true );
    $new = $_POST['your_fields'];

    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'your_fields', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'your_fields', $old );
    }
}
add_action( 'save_post', 'save_your_fields_meta' );