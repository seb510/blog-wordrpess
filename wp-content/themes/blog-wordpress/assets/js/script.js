jQuery(document).ready(function($) {
    $(document).on('click', '.search-link', function (){
        $('.header-search').fadeIn(600);
    });
    $(document).on('click', '.header-search__close', function (){
        $('.header-search').fadeOut(600);
    });

    $('.nav__list').append($('.nav__item-search'));

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

    $('.more-posts').click(function(){

        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : loadmore_params.current_page
            };
        console.log(data);

        $.ajax({ // you can also use $.post here
            url : loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                if( data ) {
                    button.text( 'More posts' ).prev().before(data); // insert new posts
                    loadmore_params.current_page++;

                    if ( loadmore_params.current_page == loadmore_params.max_page )
                        button.remove(); // if last page, remove the button

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // $( document.body ).trigger( 'post-load' );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });

});
