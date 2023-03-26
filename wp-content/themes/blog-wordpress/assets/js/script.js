jQuery(document).ready(function($) {

    $(document).on('click', '.search-link', function (){
        $('.header-search').fadeIn(400);
    });

    $(document).on('click', '.header-search__close', function (){
        $('.header-search').fadeOut(400);
    });

    $('.nav__list').append($('.nav__item-search'));

    $(document).on('click', '.menuToggle', function (){
        $(this).toggleClass("active");
        $('body').toggleClass('hidden');
        $('.header__wrapper').slideToggle(300, function(){
            if($(this).css('display') === "none"){
                $(this).removeAttr('style');
            }
        });
    })

    function load_posts(){
        pageNumber++;
        console.log(pageNumber, 'pageNumber')
        let str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '/wp-admin/admin-ajax.php',
            data: str,
            beforeSend:function (){
                $("#more_posts").text("Загрузка...");
            },
            success: function(data) {
                console.log(data.max, 'max');
                console.log(pageNumber, 'ppp')
                $("#ajax-posts").append(data.html);
                $("#more_posts").text('Показать еще');
                if(pageNumber >= data.max) {
                    $('#more_posts').hide()
                }
            },

        });
        return false;
    }

    $(document).on("click",'#more_posts',function(){
        load_posts();
    });

});
