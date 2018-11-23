<?php
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';

$cnx3 = Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    if(!empty($id_cat)&& !empty($nom) && !empty($prix) && !empty($stock)){
        $id_cat=$id_cat;
        $nom=trim($nom);
        $prix=$prix;
        $stock=$stock;
        if(intval($prix) <= 0 || intval($stock) <= 0){
            print json_encode('Valeurs nulles incorrectes');
        }else{
            $produit= new ProduitsBD($cnx3);
            $produit->AddProduits($id_cat, $nom, $prix, $stock);
            print json_encode($produit[0][0]);
        }
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}

?>

