<?php
/**
 * Template Name: Contacts page
 */
get_header();
?>

<main class="main">
    <section class="category-banner">
        <h1 class="category-banner__title">Контакти</h1>
    </section>
    <section class="contacts">
        <div class="container contacts__container">
            <div class="contacts__left">
                <h2 class="contacts__title blog-title">Контактна інформація</h2>
                <a href="tel:<?php the_field('phone'); ?>" class="phone phone--contacts"><?php the_field('phone'); ?></a>
                <address class="address">м. Київ, вул. Т.Шевченка, 9</address>
                <ul class="social list-reset">
                    <li class="social__item"><a href="<?php the_field('facebook_link'); ?>" class="social__link social__link--fb" aria-label="Наш фейсбук"></a></li>
                    <li class="social__item"><a href="<?php the_field('youtube_link'); ?>" class="social__link social__link--youtube" aria-label="Наш ютюб">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                            <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                                            <g><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"><path d="M4633.4,5010.8C2670.8,4853.5,1011.3,3577.7,364.7,1726.3C184.4,1212.2,101.9,705.7,100,128.2c0-435.5,26.9-686.8,113.2-1084c408.6-1841.8,1866.7-3299.8,3710.4-3710.4c698.3-155.4,1444.6-155.4,2148.7,0c1298.8,285.9,2463.4,1133.8,3148.3,2294.5c631.2,1062.8,832.7,2346.3,562.1,3564.6c-410.6,1843.7-1870.5,3303.7-3710.4,3710.4C5617.6,5003.1,5059.3,5045.3,4633.4,5010.8z M5995.6,1728.2c550.6-38.4,938.2-90.2,1045.6-140c184.2-84.4,241.7-197.6,289.7-577.5c42.2-331.9,49.9-1283.5,11.5-1611.5c-51.8-454.7-63.3-506.5-126.6-600.5c-111.3-166.9-236-203.4-888.3-262.8c-869.1-76.7-1841.8-76.7-2682.1,1.9c-613.9,57.5-748.2,94-853.7,239.8c-76.7,107.4-88.3,153.5-128.5,516.1c-40.3,381.8-46,1222.1-9.6,1544.4c51.8,452.8,63.3,506.5,126.6,600.5c97.8,145.8,203.4,188,596.7,232.1c297.4,34.5,771.2,69.1,1170.3,86.3C4792.7,1768.5,5692.4,1749.3,5995.6,1728.2z"/><path d="M4589.3,889.9c-28.8-32.6-32.6-113.2-32.6-775.1c0-690.7,1.9-740.5,34.5-769.3c19.2-19.2,53.7-32.6,76.7-32.6c23,0,264.8,161.1,550.6,366.4C5700.1,28.4,5727,49.5,5727,107.1c0,34.6-11.5,74.8-23,90.2c-13.4,17.3-241.7,186.1-508.4,377.9c-307,220.6-500.7,349.2-529.5,349.2C4641.1,924.4,4606.6,909,4589.3,889.9z"/></g></g>
                            </svg>
                        </a></li>
                    <li class="social__item"><a href="<?php the_field('instagram_link'); ?>" class="social__link social__link--insta" aria-label="Наш інстаграм"></a></li>
                    <li class="social__item"><a href="<?php the_field('twitter_link'); ?>" class="social__link social__link--tw" aria-label="Наш твітер"></a></li>
                </ul>
            </div>
            <div class="contacts__right">
                <div class="contacts-form-wrapper">
                    <h2 class="contacts__title blog-title">Напишіть нам</h2>
                    <?php echo do_shortcode( '[contact-form-7 id="56" title="Contact form 1"]' ); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
