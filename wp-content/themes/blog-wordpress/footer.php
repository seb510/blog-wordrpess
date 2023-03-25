<footer class="footer">
    <div class="container footer__container">
        <?php if (is_front_page()) { ?>
            <a class="logo footer__logo">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Логотип Блога">
            </a>
        <?php } else { ?>
            <a href="<?= home_url(); ?>" class="logo footer__logo">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Логотип Блога">
            </a>
        <?php }?>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_menu',
                'container_class' => 'nav footer__nav',
                'container'       => 'nav',
                'menu_class'      => 'footer-nav__list list-reset',
            ));
        ?>
        <small class="footer__copy">ООО “Організація”  <?= date('Y'); ?>. Всі права захищені</small>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>