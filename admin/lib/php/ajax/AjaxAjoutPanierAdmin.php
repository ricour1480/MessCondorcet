<?php session_start();
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produits.class.php';
require '../classes/ProduitsBD.class.php';
require '../classes/CommandeAdmin.class.php';
require '../classes/CommandeAdminBD.class.php';
require '../classes/Administrateur.class.php';
require '../classes/AdministrateurBD.class.php';
$cnx4 = Connexion::getInstance($dsn2, $user2, $pass2);
try{
    extract($_POST,EXTR_OVERWRITE);
    $ajoutpanier= new ProduitsBD($cnx4);
    $array=$ajoutpanier->getProduit($idproduit);
    $admin= new AdministrateurBD($cnx4);
    $adminInfo = $admin->getIdAdmin($_SESSION['admin']);
    $adminID=$adminInfo[0]['id_admin'];
    $stock_admin = $array[0]['stock_min'];
    $commandeAdmin = new CommandeAdminBD($cnx4);
    $commandeAdmin->Commander($adminID,$idproduit,date("d/m/Y",strtotime("+1 day")),0, $quantite);
    $ajoutpanier->UpdateStockMin($idproduit, $stock_admin+$quantite);
    print json_encode($array);
}catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

