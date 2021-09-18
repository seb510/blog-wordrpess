<?php

global $post;
get_header();
?>

<main class="main">
    <section class="category-banner">
        <h1 class="category-banner__title"><?php single_cat_title(); ?></h1>
    </section>
    <section class="content">
        <h2 class="visually-hidden">Статьи нашего блога</h2>
        <div class="container content__container">
            <div class="posts">
                <ul class="post-grid list-reset">
                    <?php
                    if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
                        <!-- Цикл WordPress -->
                        <li class="post-grid__item">
                            <article class="blog-post">
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
                                <time class="blog-post__date"><?php the_date('j F Y')?></time>
                            </article>
                        </li>
                    <?php } } else { ?>
                        <p>Записей нет.</p>
                    <?php } ?>

                </ul>

                <?php the_posts_pagination( array(
                    'mid_size' => 3,
                    'prev_text' => __( '', 'welsh-womens-aid' ),
                    'next_text' => __( '', 'welsh-womens-aid' ),
                ) ); ?>
            </div>
            <?php get_sidebar() ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
