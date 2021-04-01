$(document).ready(function () {
    $('form').submit(function( event ) {

        let json;
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url:  $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                json = jQuery.parseJSON(data);
                if (json.url) {
                    window.location.href = '/' + json.url;
                } else {
                    M.toast({html: `${json.message}`, displayLength: 3500, classes: `${json.status} alert alert-danger`});
                }
            },
        });

    });

});