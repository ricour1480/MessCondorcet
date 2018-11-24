<?php
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
            if($result[0][0] == 1){
                //$_SESSION['user']=hash("sha256",$login.$mdp);
                $userId= new UtilisateursBD($cnx);
                $resultIdu= $userId->getIdUser($login);
                $iduser=intval($resultIdu[0]['id_user']);
                //$_SESSION['userid']=$iduser;
                print json_encode('ok user');
            }
            if($result[0][0] == 0){
                print json_encode('Mauvais login ou mauvais mot de passe');
            }
            }catch(PDOException $e){
                print json_encode($e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode());
            }
        }else{
            try{
                $verifAdmin= new AdministrateurBD($cnx);
                $resultAd= $verifAdmin->verifAdmin($login, $password);
                if($resultAd[0][0] == 1){
                   // $_SESSION['admin']=hash("sha256",$login.$password);
                    print json_encode('ok admin');
                }
                if($resultAd[0][0] == 0){
                    print json_encode('Mauvais login ou mauvais mot de passe');
                }
            }catch(PDOException $e){
                print json_encode($e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode());
            }
        }
    }else{
        print json_encode("Vous devez avoir une adresse Condorcet afin d'acceder à ce service");
    }
}
?>

