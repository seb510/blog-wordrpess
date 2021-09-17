<?php

function blog_scripts() {
    wp_enqueue_style( 'blog-wordpress-style', get_stylesheet_uri(), array());
    wp_style_add_data( 'blog-wordpress-style', 'rtl', 'replace' );
    wp_enqueue_style( 'blog-wordpress-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-404', get_template_directory_uri() . '/assets/css/404.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-category', get_template_directory_uri() . '/assets/css/category.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-contacts', get_template_directory_uri() . '/assets/css/contacts.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-post', get_template_directory_uri() . '/assets/css/post.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-search', get_template_directory_uri() . '/assets/css/search.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-main', get_template_directory_uri() . '/assets/css/style.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-media', get_template_directory_uri() . '/assets/css/media.css', array(), time() );

    wp_enqueue_script( 'blog-wordpress-main', get_template_directory_uri() . '/assets/js/script.js', array(), time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'blog_scripts' );

show_admin_bar(false);

add_theme_support('post-thumbnails');