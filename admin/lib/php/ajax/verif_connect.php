<?php
session_start();
//header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';
require '../classes/Administrateur.class.php';
require '../classes/AdministrateurBD.class.php';
$cnx= Connexion::getInstance($dsn2, $user2, $pass2);
extract($_POST,EXTR_OVERWRITE);
if(!empty($login) && !empty($password)&& !empty($role)){
    $login=trim(strtolower($login));
    $mdp=md5(trim($password));
    $role=trim(strtolower($role));
    //echo $mdp; //password claire toto
    if(preg_match("/@.*condorcet\.be$/",$login)) //Verifie s'il s'agit d'une adresse condorcet
    {
        if($role=="user"){
            try{
            $verifUs= new UtilisateursBD($cnx);
            $result=$verifUs->verifUser($login, $mdp);
            if($result != null){
                $_SESSION['user']=$login;
            }
            }catch(PDOException $e){
                print json_encode($e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode());
            }
        }else{
            try{
                $verifAdmin= new AdministrateurBD($cnx);
                $result= $verifAdmin->verifAdmin($login, $password);
                if($result != null){
                    $_SESSION['admin']=$login;
                }
            }catch(PDOException $e){
                print json_encode($e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode());
            }
        }
        print json_encode($result);
    }
}
?>

