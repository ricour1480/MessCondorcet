<?php
session_start();
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';
require '../classes/CommandeUser.class.php';
require '../classes/CommandeUserBD.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';

$cnx3 = Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $user = new UtilisateursBD($cnx3);
    $userArray= $user->getIdUser($_SESSION['user']);
    $userid = $userArray[0]['id_user'];
    $array= $user->getAllInfo($_SESSION['user']);
    $credit = $array[0]['credit'];
    $confirm = new CommandeUserBD($cnx3);
    $nbrPanier=count($panier);
    $sommetot=0;
    $prix_total_produit=0;
    for($i=0;$i<=$nbrPanier-1;$i++){
        $confirm->UpdateStatut($userid,$panier[$i][0],1);
        $prix_total_produit = $panier[$i][1] * $panier[$i][2];
        $sommetot+=$prix_total_produit;
    }
    if($credit >= $sommetot){
        $newSolde = $credit - $sommetot;
        $majsolde =$user->updateCreditUser($_SESSION['user'],$newSolde);
        print json_encode("Commande confirmée");
    }else{
        for($i=0;$i<=$nbrPanier-1;$i++){
            $confirm->UpdateStatut($userid,$panier[$i][0],0);
        }
        print json_encode("Veuillez renflouer votre compte ");
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}

