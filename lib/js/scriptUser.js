/*************************************Script user****************************/
$(document).ready(function(){
    var panier="";
    var tableau = new Array();
    $("#prod").html("<option value=''>Choisissez une catégorie</option>");
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
   $("#updateMDP").click(function(){
       $.ajax({
           method:"POST",
           url:"./admin/lib/php/ajax/AjaxUpdatePassword.php",
           dataType:"json",
           data:{
               newpass:$("#zoneMDP").val()
           }
       })
       .done(function(msg){
           alert("Succès :"+msg);
       })
       .fail(function(msg){
           console.log("Fail");
       });
   });
   $("#idcate").change(function(){
       $.ajax({
           method:"POST",
           url:"./admin/lib/php/ajax/AjaxProduitCategorie.php",
           dataType:"json",
           data:{
               id_categorie: $("#idcate").val()
           }
       })
       .done(function(html){
           var tableau=html;
           var chaine=""; 
           for(var iter=0;iter<tableau.length;iter++){
               chaine="<option value='"+tableau[iter].id_produit+"'>"+tableau[iter].nom_produit+"</option>";
           }
           if(chaine === ""){
               chaine="<option value=''>Pas de produit pour cette categorie</option>";
           }
           $("#prod").html(chaine);
       })
       .fail(function(html){
           console.log(html);
       });
   });
   
   $("#searchCat").change(function(){
         $.ajax({
           method:"POST",
           url:"./admin/lib/php/ajax/AjaxProduitCategorie.php",
           dataType:"json",
           data:{
               id_categorie: $("#choixCat").val()
           }
       })
       .done(function(html){
           var tableau=html;
           var ligne="";
           var tabProduit="<table class='table' id='table_prod'><tr><th scope='row'>Nom du produit</th><th scope='row'>Prix</th></tr>"; 
           for(var iter=0;iter<tableau.length;iter++){
               ligne+="<tr><td>"+tableau[iter].nom_produit+"</td><td>"+tableau[iter].prix_produit+" € </td></tr>";
           }
           var fin="</table>";
           if(ligne === ""){
               tabProduit="";
               ligne="<div class='col-sm-5'><span class='noproduct'>Pas de produit pour cette categorie</span></div>";
               fin="";
           }
           
           $("#liste_produit").html(tabProduit+ligne+fin);
       })
       .fail(function(html){
           console.log(html);
       });
   });
   
   $("#AddPanier").click(function(){
       if($('#quantiteUser').val() > 0 && $('#prod').val() !== "" && $('#idcate').val() !=="" ){
            $.ajax({
                method:"POST",
                url:"./admin/lib/php/ajax/AjaxAjoutPanierUser.php",
                dataType:"json",
                data:{
                    id_produit :$("#prod").val()
                }
            })
            .done(function(msg){
                var bouton="<input type='button' class='btn btn-info' name='commandeUser' onclick='commandeUser();' id='commandeUser' value='Commander'/>";
                var idproduit=msg[0].id_produit;
                var nomproduit=msg[0].nom_produit;
                var prixproduit=msg[0].prix_produit;
                var quantite=$("#quantiteUser").val();
                panier+="<li id='"+idproduit+"'><span class='nomproduit"+idproduit+"'>"+nomproduit+" </span><span class='prixproduit"+idproduit+"'>Prix: "+prixproduit+" €</span><span class='quantiteprod"+idproduit+"'> Qte :"+quantite+"</li>";
                $("#panierU").html(panier+"<br>"+bouton);
            })
            .fail(function(msg){
                console.log(msg);
            });
        }else if($('#quantite').val() <= 0){
            alert("La quantité ne peut pas être nulle ni négative");
        }else if($('#prod').val() === '' || $('#idcate').val() ===''){
            alert("Veuillez selectionnez une catégorie");
        }
   });
   
});

