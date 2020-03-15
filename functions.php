<?php

// Add scripts and stylesheets
function covid20_scripts(){
    wp_enqueue_style('boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.4.1');
    wp_enqueue_style('blog', get_template_directory_uri() . '/css/blog.css');
    wp_enqueue_script('boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true);
}

add_action('wp_enqueue_scripts', 'covid20_scripts');