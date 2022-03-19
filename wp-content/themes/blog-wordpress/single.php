<?php
get_header();
?>
	<main class="main">
		<div class="post-banner">
			<div class="container post-banner__container" style="background-image: url('<?php echo get_the_post_thumbnail_url( ); ?>');"></div>
		</div>
		<section class="post-content">
			<div class="container post-content__container">
				<div class="post-wrapper">
                    <?php
                    if( have_posts() ){
                        while( have_posts() ){ the_post(); ?>
                            <div class="post" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="post-meta">
                                    <?php
                                    $category=  get_the_category();
                                    $cat_link = get_category_link( $category[0] );
                                    ?>
                                    <a href="<?php echo $cat_link; ?>" class="post-category">
                                        <?php echo $category[0]->cat_name; ?>
                                    </a>
                                    <time class="post-date"><?php the_date('j F Y') ?> </time>
                                </div>
                                <h1 class="blog-title post-title"><?php the_title(); ?></h1>
                                <p>
                                    <?php the_content(); ?>
                                </p>
                            </div>
                            <?php } ?>
                        <div class="post-links">
                            <?php
                            $prev_post = get_previous_post();
                            if($prev_post) {
                                $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
                                echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="post-links__link post-links__link--prev"><svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M2.41344 5.22558L7.03874 0.613083C7.19028 0.462049 7.43563 0.462303 7.58692 0.613865C7.73809 0.765407 7.7377 1.01089 7.58614 1.16205L3.23616 5.50002L7.58629 9.83797C7.73784 9.98914 7.73823 10.2345 7.58708 10.386C7.51124 10.462 7.41188 10.5 7.31253 10.5C7.21342 10.5 7.11446 10.4623 7.03876 10.3868L2.41344 5.77443C2.34046 5.70181 2.2995 5.60299 2.2995 5.50002C2.2995 5.39705 2.34057 5.29834 2.41344 5.22558Z"
                                            fill="#5D71DD" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="10" height="10" fill="white" transform="matrix(-1 0 0 1 10 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg><span>Попередня новина</span></a>' . "\n";
                            }

                            $next_post = get_next_post();
                            if($next_post) {
                                $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
                                echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="post-links__link post-links__link--next"><span>Следущая новость</span><svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.58656 5.22558L0.961262 0.613083C0.80972 0.462049 0.56437 0.462303 0.413081 0.613865C0.26191 0.765407 0.2623 1.01089 0.413862 1.16205L4.76384 5.50002L0.413706 9.83797C0.262164 9.98914 0.261773 10.2345 0.412925 10.386C0.488764 10.462 0.58812 10.5 0.687475 10.5C0.786576 10.5 0.88554 10.4623 0.961243 10.3868L5.58656 5.77443C5.65954 5.70181 5.7005 5.60299 5.7005 5.50002C5.7005 5.39705 5.65943 5.29834 5.58656 5.22558Z"
                                        fill="#5D71DD" />
                                </svg></a>' . "\n";
                            }
                            ?>
                        </div>

				</div>
                    <?php get_sidebar() ?>
			</div>
		</section>
	</main>
    <?php }
        else {
        echo "<h2>Записів немає.</h2>";
    } ?>

<?php get_footer()?>