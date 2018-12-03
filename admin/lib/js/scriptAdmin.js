$(document).ready(function(){
    var panierAdmin='';
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
                    idproduit:id_produit
                }
            })
            .done(function(result){
                var idproduit=result[0].id_produit;
                var nomproduit=result[0].nom_produit;
                var prixproduit=result[0].prix_produit;
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
});

