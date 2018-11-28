/*************************************Script user****************************/
$(document).ready(function(){
    $('.carousel').carousel({
        interval: 1500
    });
    $("#bouton_connexion").click(function(){
        $("#myModal").modal();
    });
    $(".connecter").click(function(){
        document.location.href="./index.php?page=formulaireConnexion";
    });
    $("#soumettre").click(function(){
        $.ajax({
            method:"POST",
            url:"./admin/lib/php/ajax/verif_connect.php",
            dataType:"json",
            data:{
                login: $("#login").val(),
                password:$("#password").val(),
                role:$("#role").val()
            }  
        })
        .done(function(msg){
           var message= msg[0].status;
            if(message === 1){
                window.location.href='index.php?page=accueil&statut=okuser';
                var valert=$("#btn_co").prop("Se deconnecter");
                console.log("Valeur : "+valert);
            }if(message === 2){
                window.location.href='admin/index.php?page=accueil&statut=okadmin';
            }else{
                console.log(message);
            }
        })
        .fail(function(msg){
            console.log("Fail:"+msg);
    });

    });
});
