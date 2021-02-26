var page = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'get_ajax_posts',
            'page': page,
            'security': pagination.security
        };
 
        $.post(pagination.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.news').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });
});
