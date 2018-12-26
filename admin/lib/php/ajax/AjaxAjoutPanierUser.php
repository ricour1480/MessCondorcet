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
    $infoUser =$user->getAllInfo($_SESSION['user']);
    $credit = $infoUser[0]['credit'];
    $ajoutpanier= new ProduitsBD($cnx3);
    //$array=$ajoutpanier->getProduit($id_produit);
    $array=$ajoutpanier->getProduit($id_produit);
    $stock=$array[0]['stock_min'];
    $prix_prod=$array[0]['prix_produit'];
    $prix_tot=$prix_prod*$quantite;
    if($quantite <= $stock && $stock != 0 && $credit>=$prix_tot){
        $userArray= $user->getIdUser($_SESSION['user']);
        $userid = $userArray[0]['id_user'];
        $commande = new CommandeUserBD($cnx3);
        $insertionCom = $commande->Commander($userid, $id_produit,date('d/m/Y', strtotime("+1 day")),0, $quantite);
        $ajoutpanier->UpdateStockMin($id_produit, $stock-1);
        print json_encode($array);
    }else if($stock == 0){
        print json_encode("Plus de stock pour ce produit");
    }else if($credit<$prix_tot){
        print json_encode("Veuillez renflouer votre compte");
    }else{
        print json_encode("La quantité souhaité est superieur au stock");
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

