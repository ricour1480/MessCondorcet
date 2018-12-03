<?php
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';

$cnx4 = Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $ajoutpanier= new ProduitsBD($cnx4);
    $array=$ajoutpanier->getProduit($idproduit);
    print json_encode($array);
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

