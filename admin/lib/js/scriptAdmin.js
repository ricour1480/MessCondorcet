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
    if($('#adduser').click(function(){
        var nom=$('#nom').val();
        var prenom=$('#prenom').val();
        var log=$('#log').val();
        var passuser=$('#passuser').val();
        var credit=$('#credit').val();
        $.ajax({
            method : "POST",
            url:"lib/php/ajax/AjaxAjoutUtilisateur.php",
            dataType:"json",
            data:{nom,prenom,log,passuser,credit}
        })
        .done(function(msg){
            alert(msg);
        })
        .fail(function(msg){
            alert('Fail :'+msg);
        });
    }));
});

