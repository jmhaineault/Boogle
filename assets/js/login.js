$(function () {
    $('a[href="#login"]').on('click', function(event) {
        event.preventDefault();
        $('#login').addClass('open');
        $('#login > form > input[type="login"]').focus();
    });
    
    $('#login, #login button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    
    //Do not include! This prevents the form from submitting for DEMO purposes only!
    $('form').submit(function(event) {
        event.preventDefault();
        return false;
    })
});