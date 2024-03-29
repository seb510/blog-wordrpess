<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
    <div class="container header__container">
        <?php if (is_front_page()) { ?>
        <a class="logo header__logo">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Логотип Блога">
        </a>
        <?php } else { ?>
        <a href="<?= home_url(); ?>" class="logo header__logo">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Логотип Блога">
        </a>
        <?php }?>
        <div class="header__wrapper">
            <div class="header__right">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'header_menu',
                    'container_class' => 'nav header__nav',
                    'container'       => 'nav',
                    'menu_class'      => 'nav__list list-reset',
                ));
                ?>
                <li class="nav__item nav__item-search"><a href="#" class="nav__link search-link">Пошук</a></li>
                <a href="+380747736862" class="phone">+38 (074) 77-36-862</a>
            </div>
        </div>
        <div class="menuToggle icon">
            <div class="hamburger"></div>
        </div>
    </div>
    <div class="header-search">
        <button class="btn-reset header-search__close">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path
                        d="M0.141602 0.834488C-0.0458984 0.646988 -0.0458984 0.334925 0.141602 0.140869C0.335657 -0.0466309 0.641164 -0.0466309 0.83522 0.140869L4.99737 4.31001L9.16651 0.140869C9.35401 -0.0466309 9.66608 -0.0466309 9.85314 0.140869C10.0472 0.334925 10.0472 0.647425 9.85314 0.834488L5.69099 4.99708L9.85314 9.16622C10.0472 9.35372 10.0472 9.66578 9.85314 9.85984C9.66564 10.0473 9.35358 10.0473 9.16651 9.85984L4.99737 5.69069L0.83522 9.85984C0.641164 10.0473 0.335657 10.0473 0.141602 9.85984C-0.0458984 9.66578 -0.0458984 9.35328 0.141602 9.16622L4.30375 4.99708L0.141602 0.834488Z"
                      fill="#2F2222" />
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="10" height="10" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </button>
        <form action="/" class="header-search__form">
            <input type="search" name="s" class="header-search__input form-input">
            <button class="header-search__btn form-btn btn-reset">
                <span>Найти</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.8779 18.6996L14.0681 12.8897C15.17 11.5293 15.8334 9.79975 15.8334 7.9167C15.8334 3.55145 12.2819 0 7.91666 0C3.55141 0 0 3.55145 0 7.9167C0 12.2819 3.55145 15.8334 7.9167 15.8334C9.79975 15.8334 11.5293 15.17 12.8897 14.0681L18.6996 19.878C18.8623 20.0407 19.1261 20.0407 19.2889 19.878L19.878 19.2888C20.0407 19.1261 20.0407 18.8623 19.8779 18.6996ZM7.9167 14.1667C4.47024 14.1667 1.66668 11.3631 1.66668 7.9167C1.66668 4.47024 4.47024 1.66668 7.9167 1.66668C11.3631 1.66668 14.1667 4.47024 14.1667 7.9167C14.1667 11.3631 11.3631 14.1667 7.9167 14.1667Z"
                        fill="white" />
                </svg>
            </button>
        </form>
    </div>
</header>