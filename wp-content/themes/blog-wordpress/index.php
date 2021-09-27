<?php

get_header();
?>

<main class="main">
    <section class="banner">

    </section>
    <section class="content">
        <div class="container">
            <h2 class="d-flex justify-center">Главные новости</h2>
        </div>
        <div class="container content__container">
            <div class="posts">
                <?php
                $result = wp_get_recent_posts( [
                    'numberposts'      => 1,
                    'offset'           => 0,
                    'category'         => 0,
                    'orderby'          => 'post_date',
                    'post_type'        => 'post',
                    'suppress_filters' => true,
                ], OBJECT );
                foreach( $result as $post ){
                    setup_postdata( $post );?>

                    <article class="blog-post blog-post--main">
                        <?php
                        $category=  get_the_category();
                        $cat_link = get_category_link( $category[0] );
                        ?>
                        <a href="<?php echo $cat_link; ?>" class="blog-post__category">
                            <?php echo $category[0]->cat_name; ?>
                        </a>
                        <h3 class="blog-post__title blog-title">
                            <a href="<?php the_permalink();?>" class="blog-post__link">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="blog-post__descr">
                            <?php
                            $content = get_the_content();
                            echo wp_trim_words( $content, 30, '&hellip;' );
                            ?>
                        </p>
                        <time class="blog-post__date"><?php the_date('j F Y'); ?></time>
                    </article>
                <?php } wp_reset_postdata(); ?>
                <ul class="ajax-posts post-grid list-reset">
                <?php
                $args = array(
                    'post_type'    => 'post',
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    'offset'         => 1,
                    'orderby'        => 'post_date',
                );

                $query = new WP_Query( $args );

                // Цикл
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                         get_template_part( 'template/post');
                    }
                }
                wp_reset_postdata(); ?>
                </ul>
                <?php echo get_the_posts_pagination();  ?>
            </div>
            <?php get_sidebar() ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
