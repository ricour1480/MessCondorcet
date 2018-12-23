<?php
//header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';
$cnx2= Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $util = new UtilisateursBD($cnx2);
    $data=$util->searchUser($mot);
    print json_encode($data);
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>