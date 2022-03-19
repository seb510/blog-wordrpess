<?php
/**
 * The template for displaying Search Results pages.
 *

 */

get_header(); ?>

    <main class="main">
        <section class="search-blocks">
            <div class="container search-blocks__container">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <h1 class="page-title"><?php printf( __( 'Результаты поиска: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header><!-- .page-header -->
                    <div class="posts">
                        <ul class="post-grid list-reset">
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
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
                    <?php endwhile; ?>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="container search-blocks__container">
                        <h1 class="search-blocks__title blog-title">Результати пошук</h1>
                        <span class="not-found-text">Нічого не знайдено</span>
                    </div>
                <?php endif; ?>
                <?php get_sidebar(); ?>

                <?php the_posts_pagination( array(
                    'mid_size' => 3,
                    'prev_text' => __( '', 'welsh-womens-aid' ),
                    'next_text' => __( '', 'welsh-womens-aid' ),
                ) ); ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>