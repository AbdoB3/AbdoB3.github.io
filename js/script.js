$(function(){
    $('#contact-form').submit(function(e){
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();
        $.ajax({
            method:'POST',
            url: 'php/contact.php',
            data: postdata,
            dataType: 'json',
            success: function (result) {
                if (result.isSubmit) {
                    $('#contact-form').append("<p class='thanks' >Your message has been sent,Thanks for contacting me :) </p>");
                    $('#contact-form')[0].reset();
                } else {
                    $("#prenom + .comments").html(result.prenomerror);
                    $("#nom + .comments").html(result.nomerror);
                    $("#mail + .comments").html(result.mailerror);
                    $("#tel + .comments").html(result.telerror);
                }
            }
        });
    });
})