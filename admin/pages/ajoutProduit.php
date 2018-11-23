<?php
    $categorie=new CategorieBD($cnx);
    $allcat=$categorie->getAllCategorie();
    $nbrcat=count($allcat);
    
?>
<section class="content-header">
    <h1>
        Ajouter un nouveau produit
        <small>Formulaire d'ajout d'un produit</small>
    </h1>
</section>
<section class="content">
    <div class="formulaire">
        <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group row">
            <label for="categorie" class="col-sm-4">Catégorie</label>
            <div class="col-sm-4">
                <select name="idcat" id="idcat">
                    <?php
                    for($i=0;$i<$nbrcat;$i++){
                        ?>
                        <option value="<?php print $allcat[$i]['id_categorie']; ?>"><?php print $allcat[$i]['libelle_categorie']; ?></option>;
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nom_produit" class="col-sm-4"/>Nom du Produit</label>
            <div class="col-sm-6">
                <input type="text" name="nom_prod" required id="nom_prod"/> *
            </div>        
        </div>
        <div class="form-group row">
            <label for="prix_produit" class="col-sm-4"/>Prix du Produit</label>
            <div class="col-sm-6">
                <input type="number" min=0 step="0.01" name="prix_prod" required id="prix_prod"/> *
            </div>        
         </div> 
        <div class="form-group row">
            <label for="prix_produit" class="col-sm-4"/>Stock</label>
            <div class="col-sm-4">
                <input type="number" name="stock_prod" required id="stock_prod"/> *
            </div>        
        </div> 
        <div class="form-group row">
            <div class="col-sm-4">
                <button class="btn btn-light pull-right" name="ajoutProd" id="ajoutProd">Ajouter le produit</button>
            </div>        
        </div>     
        </form>
    </div>
</section>

