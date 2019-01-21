/*************************************Script user****************************/
$(document).ready(function(){
    var tableau = new Array();
    var Panier = new Array();
    Panier.push(new Array());
     var cpt = 0;
     $("#comUs").hide();
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
                alert("Cette utilisateur/administrateur n'existe pas !!!");
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
           var image="";
           var tabProduit="<table class='table table-bordered' id='table_prod'><tr><th scope='col'>Image</th><th scope='col'>Nom du produit</th><th scope='col'>Prix</th><th scope='col'>Stock restant</th></tr>"; 
           for(var iter=0;iter<tableau.length;iter++){
               switch(tableau[iter].id_categorie){
                   case 1 : image ="<img src='./admin/images/dejeuner.jpg' width='75px' alt='petit_dej'";break;
                   case 2 : image ="<img src='./admin/images/menu.jpg' width='75px' alt='menu'";break;
                   case 3 : image ="<img src='./admin/images/salade.jpg' width='75px' alt='salade'";break;
                   case 4 : image ="<img src='./admin/images/potage.jpg' width='75px' alt='potage'";break;
                   case 5 : image ="<img src='./admin/images/sandwich.jpg' width='75px' alt='sandwich'";break;
                   case 6 : image="<img src='./admin/images/dessert.jpg' width='75px' alt='dessert'";break;
                   case 7 : image="<img src='./admin/images/boisson.jpg' width='75px' alt='boisson'";break; 
               }
               ligne+="<tr><td>"+image+"</td><td>"+tableau[iter].nom_produit+"</td><td>"+tableau[iter].prix_produit+" € </td><td>"+tableau[iter].stock_min+"</td></tr>";
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
                    id_produit :$("#prod").val(),
                    quantite:$("#quantiteUser").val()
                }
            })
            .done(function(msg){
               if(Array.isArray(msg)){
                $("#comUs").show();   
                var id_produit = msg[0].id_produit; 
                var nom_produit = msg[0].nom_produit;
                var quantite = $("#quantiteUser").val();
                var prix = msg[0].prix_produit;
                var prix_tot = prix * quantite;
                Panier.push(new Array());
                Panier[cpt].push(id_produit);
                Panier[cpt].push(nom_produit);
                Panier[cpt].push(quantite);
                Panier[cpt].push(prix);
                Panier[cpt].push(prix_tot);
                console.log(Panier);
                cpt++;
                var panier="";
                for(var i= 0;i<Panier.length-1;i++){
                    panier+="<li id='"+Panier[i][0]+"'><span class='nomproduit"+Panier[i][0]+"'>"+Panier[i][1]+" </span> "+
                        " <span class='prixproduit"+Panier[i][0]+"'>Prix Total: "+Panier[i][4]+" €</span> "+
                        " <span class='quantiteprod"+Panier[i][0]+"'> Qte : <input type='number' min='1' disabled value='"+Panier[i][2]+"'  id='qteprod"+Panier[i][0]+"' /></li>";
                }
                $("#panierU").html(panier+"<br>");
                }else{
                    alert(msg);
                }
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
   $('#comUs').click(function(){
       if(Panier.length <=1){
           alert('Veuillez ajouter au moins un article');
       }else{
           $.ajax({
               method:"POST",
               url:"./admin/lib/php/ajax/AjaxUpdateStatutCommande.php",
               dataType:"json",
               data:{
                   panier:Panier
               }
           })
           .done(function(msg){
               alert(msg);
               window.location.href="./index.php?page=commandeUser";
           }).fail(function(msg){
               console.log(msg);
           });
       }
   });
});
//function supprimerCom(idproduit){
//    $.ajax({
//        method:"POST",
//        url:"./admin/lib/php/ajax/AjaxDeleteCommande.php",
//        dataType:"json",
//        data:{
//            idproduit: idproduit
//        }
//    })
//    .done(function(data){
//        alert("Commande du produit annulée");
//        $('#'+idproduit).hide();
//        Panier[].splice();
//    })
//    .fail(function(data){
//        console.log(data);
//    });
//}
//function updateQteProd(idproduit){
//    $.ajax({
//        method:"POST",
//        url:"./admin/lib/php/ajax/AjaxUpdateQteProduit.php",
//        dataType:"json",
//        data:{
//            newQte : $("qteProd"+idproduit).val(),
//            idproduit: idproduit
//        }
//    })
//    .done(function(data){
//        alert(data);
//    })
//    .fail(function(data){
//        console.log(data);
//    });
//}

