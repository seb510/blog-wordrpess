<?php

/*** include blog_scripts ***/
function blog_scripts() {
    wp_enqueue_style( 'blog-wordpress-style', get_stylesheet_uri(), array());
    wp_style_add_data( 'blog-wordpress-style', 'rtl', 'replace' );
    wp_enqueue_style( 'blog-wordpress-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-main', get_template_directory_uri() . '/assets/css/style.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-media', get_template_directory_uri() . '/assets/css/media.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-404', get_template_directory_uri() . '/assets/css/404.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-category', get_template_directory_uri() . '/assets/css/category.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-contacts', get_template_directory_uri() . '/assets/css/contacts.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-post', get_template_directory_uri() . '/assets/css/post.css', array(), time() );
    wp_enqueue_style( 'blog-wordpress-search', get_template_directory_uri() . '/assets/css/search.css', array(), time() );

    wp_enqueue_script( 'blog-wordpress-main', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'blog_scripts' );

/** Enable admin bar **/
show_admin_bar(false);

/** Support post image **/
add_theme_support('post-thumbnails');

/** Add menu **/
add_theme_support('menus');

/** Custom menu **/
function wpb_custom_new_menu() {
    register_nav_menus(
        array(
            'my-custom-menu' => __( 'My Custom Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'wpb_custom_new_menu' );

function load_more_scripts() {

    global $wp_query;

    wp_localize_script( 'blog-wordpress-main', 'loadmore_params', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );

    wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'load_more_scripts' );

function loadmore_ajax_handler(){

    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if( have_posts() ) :
        // run the loop
        while( have_posts() ): the_post();
            get_template_part( 'template/post');
        endwhile;
    endif;
    die;
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler');