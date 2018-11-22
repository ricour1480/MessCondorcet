<?php
header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/UtilisateursBD.class.php';

$cnx2= Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $nom=trim($nom);
    $prenom=trim($prenom);
    $cleSecrete=hash("sha256","ZxN5KjRzSEOcWSxLJSWbLyjKGTHH0VKscbeilnR9YAqeO9zKhguOxc2HhW4GZ00lZje8ecHJAoM1Nmlpx7k2riQJl55VFY53CLfTdAhWphDkpsZbN46q1oWN");
    $log=trim(strtolower($log));
    $mdp= crypt(trim($passuser), $cleSecrete);
    if(intval($credit) < 20){
        print json_encode('Credit Insuffissant : Min 20 €');
    }else{
        $utilisateur= new UtilisateursBD($cnx2);
        $utilisateur->AjoutUtilisateur($nom, $prenom, $log, $mdp, $credit);
        print json_encode($utilisateur);
    }
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
?>

