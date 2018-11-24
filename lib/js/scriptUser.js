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
            if(msg ==='ok user'){
                window.location.href='index.php';
                $('#btn_co').removeClass('.connecter');
                $('#btn_co').addClass('.deconnecter');
                $('#btn_co').value='Se déconnecter';
            }if(msg ==='ok admin'){
                window.location.href='admin/index.php?page=accueil';
                $('#btn_co_admin').removeClass('.connecter');
                $('#btn_co_admin').addClass('.deconnecter');
                $('#btn_co_admin').value='Se déconnecter';
            }else{
                alert(msg);
            }
        })
        .fail(function(msg){
            alert("Fail:"+msg);
    });

    });
});
