<?php
$prod=new ProduitsBD($cnx);
$tabprod=$prod->getAllProduits();
$nbrprod=count($tabprod);
?>
<section class="content-header">
    <h1>Commande auprès du fournisseur</h1>
</section>
<section class="content">
    <ul class="breadcrumb">
        <li class="breadcrumb-item rouge"> les champs suivis de * sont <b>obligatoires</b></li>
    </ul>
    <div class="formulaire pull-left col-sm-6">
        <div class="form-group row">
            <label for="produitAdmin" class="col-sm-3">Produit :</label>
            <div class="col-sm-4">
                <select id="idproduit" name="idproduit" required>
                    <?php
                    for($i=0;$i<$nbrprod;$i++){
                        ?>
                    <option value="<?php print $tabprod[$i]['id_produit']; ?>"><?php print $tabprod[$i]['nom_produit'];?></option>    
                        <?php
                    }
                    ?>
                </select> *
            </div>
        </div>
        <div class="form-group row">
            <label for="dateCommande" class="col-sm-3">Date :</label>
            <div class="col-sm-4">
                <input type="date" name="dateCom" id="dateCom" class="datepicker-dropdown"/> *
            </div>
        </div>
        <div class="form-group row">
            <label for="quantiteCom" class="col-sm-3">Quantité souhaitée :</label>
            <div class="col-sm-4">
                <input type="number" id="qteCom" name="qteCom" min="0" /> *
            </div>
        </div>
        <br/><br/>
        <div class="form-group row">
            <div class="col-sm-6 ">
                <input type="button" class="btn btn-light pull-right" id="ajoutPan" name="ajoutPan" value="Ajouter au panier" />
            </div>
        </div>
    </div>
    <!-- Panier de commande admin-->
    <div class="panierAdmin pull-right col-sm-4 box">
        <h6 class=" box-header titre_panier"><b>Panier de Commande</b></h6>
        <section class="content">
            <section class="liste_panier box-body"></section>
        </section>
        <input type="button" class="btn btn-info pull-right" name="commanderAdmin" id="commanderAdmin" value="Commander"/>
    </div>
</section>
