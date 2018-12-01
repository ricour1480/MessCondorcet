<?php
$categ = new CategorieBD($cnx);
$arraycat= $categ ->getAllCategorie();
$nbrC = count($arraycat);
?>
<section class="content-header">
    <h1>
      Nos produits:
      
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Pour voir les produits, veuillez selectionner une catégorie</li>
        </ol>
    </nav>
</section>
<section class="content-wrapper">
    <div class="row" id="searchCat">
        <div class="col-sm-3">Catégorie :</div>
        <div class="col-sm-4">
            <select name="choixCat" id="choixCat">
                <option value="">Veuillez selectionner une catégorie</option>
                <?php for($i=0;$i<$nbrC;$i++){ ?>
                <option value="<?php print $arraycat[$i]['id_categorie']; ?>"><?php print $arraycat[$i]['libelle_categorie'];?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <br>
    <div class="container-fluid" id="liste_produit"></div>
</section>

