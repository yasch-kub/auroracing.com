$(document).ready(function() {
    $('#regForm, #logForm').submit(function(event) {
        event.preventDefault();
        console.log($(this).attr('action'));
        $.post($(this).attr('action'), $(this).serialize(), function(response) {
            console.log(response);
            if (response.status == 'ok')
                location.reload(true);
        }, 'json');
    })
});