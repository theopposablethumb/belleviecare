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
/*
let request = new XMLHttpRequest();

let data = {
            'action': 'get_ajax_posts',
            'page': page,
            'security': pagination.security
        };

let pagination = () => {
	let button = document.querySelector('.loadmore');
	button.addEventListener("click", function(){
		request.open('POST', pagination.ajax_url, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
    			// If successful
        		console.log(this.response);
     		} else {
        		// If fail
        		console.log(this.response);
    		}
		};
		request.onerror = function() {
    		// Connection error
		};
 		request.send(data);
	})
}
 
 let docReady = () => {
    document.addEventListener("DOMContentLoaded", function(){
  		pagination();
    }
}
docReady();
*/