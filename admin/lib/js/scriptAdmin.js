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
    $('#adduser').click(function(){
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
        .done(function(){
            alert('Insertion éffectuée');
        })
        .fail(function(msg){
            alert('Valeur de retour :'+msg+' erreur :'+console.log+' '+console.info);
        });

    });
    $('#ajoutProd').click(function(){
        var id_cat = $('#idcat option:selected').val();
        var nom = $('#nom_prod').val();
        var prix = $('#prix_prod').val();
        var stock = $('#stock_prod').val();
        $.ajax({
            method : "POST",
            url:"lib/php/ajax/AjaxAjoutUtilisateur.php",
            dataType:"json",
            data:{id_cat,nom,prix,stock},
            success:function(msg){
                alert('Insertion du produit éffectuée :'+msg);
            },
            error:function(msg){
                alert(msg.statusText);
            }
        });
        
    });
});

