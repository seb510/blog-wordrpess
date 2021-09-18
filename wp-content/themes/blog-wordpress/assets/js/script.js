jQuery(document).ready(function($) {
    $(document).on('click', '.search-link', function (){
        $('.header-search').fadeIn(600);
    });
    $(document).on('click', '.header-search__close', function (){
        $('.header-search').fadeOut(600);
    });

    $(document).on('submit', '.callback-form', (e) =>{
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
    })
});
