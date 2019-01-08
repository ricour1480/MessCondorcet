$(document).ready(function(){
    var panierAdmin='';
    var panAdmin=new Array();
    var cpt=0;
    panAdmin.push(new Array());
    $('.carousel').carousel({
        interval: 1500
    });
    //onblur ??? adresse login
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
        .done(function(msg){
            alert(msg);
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
            url:"lib/php/ajax/AjaxAjoutProduit.php",
            dataType:"json",
            data:{id_cat,nom,prix,stock}
        })
        .done(function(msg){
            alert("msg");
    
        })
        .fail(function(msg){
            alert(msg);
        });
        
    });
    $('#ajoutPan').click(function(){
        var id_produit = $('#produitAdmin').val();
        var qte = $('#qteCom').val();
        if(qte > 0){
            $.ajax({
                method : "POST",
                url:"lib/php/ajax/AjaxAjoutPanierAdmin.php",
                dataType:"json",
                data:{
                    idproduit:id_produit,
                    quantite:qte
                }
            })
            .done(function(result){
                var idproduit=result[0].id_produit;
                var nomproduit=result[0].nom_produit;
                var prixproduit=result[0].prix_produit;
                panAdmin.push(new Array());
                panAdmin[cpt].push(id_produit);
                panAdmin[cpt].push(qte);
                panAdmin[cpt].push(prixproduit);
                cpt++;
                console.log(panAdmin);
                panierAdmin+="<li id='admin"+idproduit+"'><span class='nomproduitadmin"+idproduit+"'>"+nomproduit+" </span><span class='prixproduitadmin"+idproduit+"'>Prix: "+prixproduit+" €</span><span class='quantiteprodadmin"+idproduit+"'> Qte :"+qte+"</li>";
                $(".liste_panier").html(panierAdmin);
            })
            .fail(function(result){
                console.log(result);
            });
        }else{
            alert('Quantité négative ou nulle');
        }
    });
//    $('#searchUser').keyup(function(){
//        var mot = $('#searchUser').val();
//        if(mot !== ''){
//            $.ajax({
//                method:"POST",
//                url:"lib/php/ajax/AjaxRechercheUser.php",
//                data:{
//                    mot:mot
//                }
//            })
//            .done(function(resultat){
//                console.log(resultat);
//                if(resultat !==''){
//                   var id_user = resultat[0].id_user;
//                    var nom =resultat[0].nom;
//                    var prenom = resultat[0].prenom;
//                    var solde = resultat[0].credit;
//                    search ="<tr><td>"+nom+"</td><td>"+prenom+"</td><td>"+solde+"</td>"+
//                     "<td><input type='number' disabled id='montant"+id_user+"' min='0' />&nbsp;<input type='button' class='btn btn-info'  onclick='EnableArea("+id_user+");' id='EnableZone' value='Activer/Desactiver'/></td>"+
//                     "<td><input type='button' id='validchangement'class='btn btn-info' onclick='valid("+id_user+");' value='Valider'/> </td></tr>";
//                    $('#table_user').html(search);
//                }
//            })
//            .fail(function(resultat){
//                console.log(resultat);
//            });
//        }
//    });
});
function EnableArea(iduser){
    if($("#montant"+iduser).attr("disabled")){
        $("#montant"+iduser).removeAttr("disabled");
    }else{
        $("#montant"+iduser).attr("disabled","disabled");
    }
}
function valid(iduser){
    var montant = $("#montant"+iduser).val();
    $.ajax({
            method:"POST",
            url:"lib/php/ajax/AjaxUpdateCredit.php",
            dataType:"json",
            data:{
                userid2:iduser,
                montant:montant
            }
    })
    .done(function(msg){
        alert(msg);
        window.location.href="./index.php?page=listeUsers";
    })
    .fail(function(msg){});
}

