<?php
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';

$cnx3 = Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $ajoutpanier= new ProduitsBD($cnx3);
    $array=$ajoutpanier->getProduit($id_produit);
    print json_encode($array);
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

