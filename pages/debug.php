<?php
/*$login='ricour@condorcet.be';
$mdp='021';
$test=new UtilisateursBD($cnx);
$connect=$test->verifUser($login, md5($mdp));
var_dump($connect);*/
try{
    extract($_GET,EXTR_OVERWRITE);
    $ajoutpanier= new ProduitsBD($cnx);
    //$array=$ajoutpanier->getProduit($id_produit);
    $array=$ajoutpanier->getProduit($id_produit);
    $stock=$array[0]['stock_min'];
    if($quantite <= $stock){
        $user = new UtilisateursBD($cnx);
        $userArray= $user->getIdUser($_SESSION['user']);
        $userid = $userArray[0]['id_user'];
        $commande = new CommandeUserBD($cnx);
        $insertionCom = $commande->Commander($userid, $id_produit,date('d/m/Y'),1, $quantite);
        
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

