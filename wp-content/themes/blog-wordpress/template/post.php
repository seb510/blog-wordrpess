<li class="post-grid__item">
    <article class="blog-post" >
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
