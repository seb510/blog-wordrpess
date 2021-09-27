jQuery(document).ready(function($) {
    $(document).on('click', '.search-link', function (){
        $('.header-search').fadeIn(600);
    });
    $(document).on('click', '.header-search__close', function (){
        $('.header-search').fadeOut(600);
    });

    $('.nav__list').append($('.nav__item-search'));

});
