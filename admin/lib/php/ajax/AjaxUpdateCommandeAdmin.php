<?php
session_start();
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';
require '../classes/CommandeAdmin.class.php';
require '../classes/CommandeAdminBD.class.php';
require '../classes/Administrateur.class.php';
require '../classes/AdministrateurBD.class.php';
$cnx3 = Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $adm = new AdministrateurBD($cnx3);
    $adminArray = $adm->getIdAdmin($_SESSION['admin']);
    $admID =$adminArray[0]['id_admin'];
    $comAdm = new CommandeAdminBD($cnx3);
    $nbrAdm = count($padmin);
    $liste_com='Votre commande:\n\n';
    $somme=0;
    for($i = 0;$i<=$nbrAdm-1;$i++){
        $comAdm->UpdateRecu($admID,$padmin[$i][0]);
        $prixtot = $padmin[$i][2]*$padmin[$i][3];
        $liste_com.='\n'.$padmin[$i][1].' Qte: '.$padmin[$i][2].' Prix  :'.$prixtot;
        $somme+=$prixtot;
    }
    $liste_com.='\n\nPrix Total de la commande :'.$somme;
    print json_encode($liste_com);
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

