jQuery(document).ready(function($) {

    $(document).on('click', '.search-link', function (){
        $('.header-search').fadeIn(600);
    });

    $(document).on('click', '.header-search__close', function (){
        $('.header-search').fadeOut(600);
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

    let ppp = 2; // Post per page
    let pageNumber = 1;

    function load_posts(){
        pageNumber++;
        let str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            beforeSend:function (){
                $("#more_posts").text("Загрузка...");
            },
            success: function(data){
                console.log(data)
                let $data = $(data);
                if($data.length){
                    $("#ajax-posts").append($data);
                    $("#more_posts").text('Показать еще');
                } else{
                    $("#more_posts").fadeOut();
                }
            }

        });
        return false;
    }

    $(document).on("click",'#more_posts',function(){
        load_posts();
    });

});
