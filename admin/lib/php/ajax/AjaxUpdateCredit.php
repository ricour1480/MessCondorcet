<?php
session_start();
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';
$cnx2= Connexion::getInstance($dsn2, $user2, $pass2);

try{
    extract($_POST,EXTR_OVERWRITE);
    if(empty($montant) || $montant <= 0){
        print json_encode("Entrez une valeur correcte");
    }elseif (!empty ($montant) && $montant>0) {
        $us = new UtilisateursBD($cnx2);
        $userA=$us->getLoginCredit($userid2);
        $credit = $userA[0]['credit'];
        $login = $userA[0]['login'];
        $montant = intval($montant);
        $newmontant = $credit + $montant;
        $us->updateCreditUser($login, $newmontant);
        print json_encode($credit);
    }
} catch (PDOException $e){
     print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

