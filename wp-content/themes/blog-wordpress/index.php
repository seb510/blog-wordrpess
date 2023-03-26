<?php

get_header();
?>

<main class="main">
    <section class="banner">

    </section>
    <section class="content">
        <div class="container">
            <h2 class="d-flex justify-center">Головні новини</h2>
        </div>
        <div class="container content__container">
            <div class="posts">
                <ul id="ajax-posts" class="post-grid list-reset">
                <?php

                $postsPerPage = 3;
                $page = 1;
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => $postsPerPage,
                    'post_status'    => 'publish',
                    'paged' => $page,
                );

                $query = new WP_Query( $args );

                // Цикл
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $post_not_in[] = get_the_ID();
                        get_template_part( 'template/post');
                    }
                }
                wp_reset_postdata(); ?>
                </ul>
                <?php ?>
                <div id="more_posts" class="btn load-more">Показати ще</div>

                <script>
                    let ppp = '<?= $postsPerPage ?> '; // Post per page
                    let pageNumber = '<?= $page; ?>';
                </script>

            </div>
            <?php get_sidebar() ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
