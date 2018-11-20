<?php
header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Utilisateurs.class.php';
require '../classes/UtilisateursBD.class.php';

$cnx= Connexion::getInstance($dsn2, $user2, $pass2);
extract($_POST,EXTR_OVERWRITE);
if(!empty($login) && !empty($password)&& !empty($role)){
    $cleSecrete=hash("sha256","ZxN5KjRzSEOcWSxLJSWbLyjKGTHH0VKscbeilnR9YAqeO9zKhguOxc2HhW4GZ00lZje8ecHJAoM1Nmlpx7k2riQJl55VFY53CLfTdAhWphDkpsZbN46q1oWN");
    $login=trim(strtolower($login));
    $mdp= crypt(trim($password), $cleSecrete);
    $role=trim(strtolower($role));
    //echo $mdp; //password claire toto
    if(preg_match("/@.*condorcet\.be$/",$login)) //Verifie s'il s'agit d'une adresse condorcet
    {
        if($role=="user"){
            try{
            $verifUs= new UtilisateursBD($cnx);
            $result=$verifUs->verifUser($login, $mdp);
            print json_encode($result);
            }catch(PDOException $e){
                print json_encode($e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode());
            }
        }else{
            $query="select count(*) from admin where login=:log and mdp=:pwd";
        }
    }else{
        print json_encode("Vous devez avoir une adresse Condorcet afin d'acceder à ce service");
    }
}
?>

