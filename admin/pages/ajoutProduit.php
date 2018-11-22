<?php
    /*$categorie=new CategorieBD($cnx);
    $allcat=$categorie->getAllCategorie();
    $nbrcat=count($allcat);
    */
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
                    for($i==0;$i<$nbrcat;$i++){
                        print '<option value="'.print $allcat[$i]['id_categorie'].'">'.print $allcat[$i]['libelle_categorie'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nom_produit" class="col-sm-4"/>Nom du Produit</label>
            <div class="col-sm-4">
                <input type="text" name="nom_prod" id="nom_prod"/> *
            </div>        
        </div>
        <div class="form-group row">
            <label for="prix_produit" class="col-sm-4"/>Prix du Produit</label>
            <div class="col-sm-4">
                <input type="number" name="prix_prod" id="prix_prod"/> *
            </div>        
         </div> 
        <div class="form-group row">
            <label for="prix_produit" class="col-sm-4"/>Stock</label>
            <div class="col-sm-4">
                <input type="number" name="stock_prod" id="stock_prod"/> *
            </div>        
        </div> 
        </form>
    </div>
</section>

