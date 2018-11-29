<?php
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';
$cnx2= Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $p = new ProduitsBD($cnx2);
    $array_p = $p->getProduitByCat($id_categorie);
    print json_encode($array_p);
} catch (PDOException $e){
     print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}

