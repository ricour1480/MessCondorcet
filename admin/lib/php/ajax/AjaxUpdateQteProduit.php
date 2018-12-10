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
    $ajoutpanier= new ProduitsBD($cnx3);
    //$array=$ajoutpanier->getProduit($id_produit);
    $array=$ajoutpanier->getProduit($idproduit);
    $stock=$array[0]['stock_min'];
    
    if( $newQte <= $stock){
        $user = new UtilisateursBD($cnx3);
        $userArray= $user->getIdUser($_SESSION['user']);
        $userid = $userArray[0]['id_user'];
        $commande = new CommandeUserBD($cnx3);
        $commande->UpdateQte($userid, $idproduit, $newqte);
        print json_encode($array);
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

