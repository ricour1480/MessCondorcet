<?php
session_start();
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';
$cnx2= Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    if(!empty($newpass)){
        $update= new UtilisateursBD($cnx2);
        $maj=$update->UpdatePassword($_SESSION['user'], md5($newpass));
        print json_encode("Mise à jour");
        
    }
} catch (PDOException $e){
     print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

