<?php
/**
 * Template Name: About page
 */
    get_header();
?>

    <main class="main">
        <section class="category-banner">
            <h1 class="category-banner__title">О нас</h1>
        </section>
        <section class="content">
            <div class="container">
                <h2 class="">Что мы делаем</h2>
                <div class="container content__container">

                    <?php get_sidebar() ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
