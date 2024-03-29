<?php

/*** include blog_scripts ***/
function blog_scripts() {
    global $wp_query;
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
            'header_menu' => __( 'Header Menu' ),
            'footer_menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'wpb_custom_new_menu' );

/** Load more **/

function more_post_ajax(){

    $postsPerPage = (isset($_POST["ppp"])) ? $_POST["ppp"] : 2;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

    $ajaxposts = new WP_Query([
        'suppress_filters' => true,
        'post_type'      => 'post',
        'posts_per_page' => $postsPerPage,
        'post_status'    => 'publish',
        'paged' => $page,
    ]);

    $response = '';
    $max_pages = $ajaxposts->max_num_pages;

    $output = '';
    if($ajaxposts->have_posts()) {
        ob_start();
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('template/post');
        endwhile;
        $output = ob_get_contents();
        ob_end_clean();
    } else {
        $response = '';
    }

    $result = [
        'max' => $max_pages,
        'html' => $output,
    ];

    echo json_encode($result);
    exit;
}

add_action('wp_ajax_more_post_ajax', 'more_post_ajax'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); // wp_ajax_nopriv_{action}