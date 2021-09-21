jQuery(document).ready(function($) {
    $(document).on('click', '.search-link', function (){
        $('.header-search').fadeIn(600);
    });
    $(document).on('click', '.header-search__close', function (){
        $('.header-search').fadeOut(600);
    });

    /*$(document).on('submit', '.callback-form', (e) =>{
        e.preventDefault();

        let action = $(e.currentTarget).attr('action');
        let th = $(e.currentTarget);

        $.ajax({
            type: 'POST',
            url : action,
            data: th.serialize()
        }).done(function (){
            console.log('Отправлено!');
        })
    });*/



    var ppp = 3; // Post per page
    var pageNumber = 1;


    function load_posts(){
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    $(".ajax-posts").append($data);
                    $("#more_posts").attr("disabled",false);
                } else{
                    $("#more_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#more_posts").on("click",function(){ // When btn is pressed.
        $("#more_posts").attr("disabled",true); // Disable the button, temp.
        load_posts();
    });
});
