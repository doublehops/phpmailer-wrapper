$(document).ready(function() {

    $('#form').submit(function(e) {

        showLoader(true);
        formData = { name: $('#form #name').val(),
                     email: $('#form #email').val(),   
                     subject: $('#form #subject').val(),   
                     message: $('#form #message').val(),   
                   }

        $.post($('#form').attr('action'),
            formData,
            function(data, textStatus, jqXHR) {
                showLoader(false);
                if(data.success == true) {
                    showSubmissionSuccess();
                } else {
                    showSubmissionError();
                }
            }
        );

        return false;
    });

    function showSubmissionSuccess() {

        $('.content').html('<p>Your email has been sent.</p>');
    }

    function showSubmissionError() {

        alert('Unable to send email');
    }

    function showLoader(show) {

        if(show) {
            //$('.loader').show();
            $('#form #submit').css({opacity: 0.7});
            $('#form #submit').val('Sending...');
        } else {
            //$('.loader').hide();
            $('#form #submit').val('SUBMIT');
        }
    }
});
