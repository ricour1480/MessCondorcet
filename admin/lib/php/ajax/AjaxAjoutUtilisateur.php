<?php
//header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';
$cnx2= Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $nom=trim($nom);
    $prenom=trim($prenom);
    $log=trim(strtolower($log));
    $mdp= md5(trim($passuser));
    if(preg_match("/@.*condorcet\.be$/",$log)){
        if(intval($credit) < 20){
            print json_encode('Credit Insuffissant : Min 20 €');
        }else{
            $utilisateur= new UtilisateursBD($cnx2);
            $utilisateur->AjoutUtilisateur($nom, $prenom, $log, $mdp, $credit);
            print json_encode("Utilisateur ajouté");
        } 
    }else{
        print json_encode("Format obligatoire :prenom.nom@condorcet.be");
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

