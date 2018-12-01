<?php
require './lib/php/verif_connexion.php';
$cate= new CategorieBD($cnx);
$cat_array=$cate->getAllCategorie();
$nbr_cat=count($cat_array);

?>
<section class="content-header">
    <h1>Commande</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Choississez ce que vous souhaitez commander. Nous vendons de tous : de la salade au petit dèj passant par les sandwiches, les snacks et les softs</li>
        </ol>
    </nav>
</section>
<section class="content-wrapper">
    <section  id="formulaire_commande" class="pull-left">
        <div class="form-group row">
            <label for="categorie" class="col-sm-3">Type du produit :</label>
            <div class="col-sm-4">
                <select id="idcate" name="idcate" required>
                    <option value="">Veuillez selectionner une catégorie</option>
                        <?php
                        for($i=0;$i<$nbr_cat;$i++){
                            ?>
                        <option value="<?php print $cat_array[$i]['id_categorie']; ?>"><?php print $cat_array[$i]['libelle_categorie'];?></option>    
                            <?php
                        }
                        ?>
                    </select> *
            </div>
        </div>
        <div class="form-group row">
            <label for="produit" class="col-sm-3">Produit disponible :</label>
            <div class="col-sm-4">
                <select id="prod" name="prod" required></select> *
            </div>
            <div class="col-sm-4" id="image_produit"></div>
        </div>
        <div class="form-group row">
            <label for="qteUser" class="col-sm-3">Quantité :</label>
            <div class="col-sm-4">
                <input type="number" min="1" required name="quantiteUser" id="quantiteUser"/> *
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <button class="btn btn-light pull-right" name="AddPanier" id="AddPanier">Ajouter au panier</button>
            </div>
        </div>
    </section>
    <section  id="panierUser" class="pull-right">
    <h4>Panier:</h4>
    <hr>  
    <div class="container-fluid" id="panierU"></div>
    </section>
</section>
<small class="pull-right col-sm-2"> * champ(s) obligatoire(s)</small>
