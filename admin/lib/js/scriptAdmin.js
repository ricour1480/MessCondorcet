$(document).ready(function(){
    $('.carousel').carousel({
        interval: 1500
    });
    $('#credit').keyup(function(){
        var credit=$('#credit').val();
        if(credit < 20 && credit != ''){
            $("#erreurcredit").html('<p>Min 20€</p>');
        }else{
            $("#erreurcredit").html('');
        }
    });
    
});

