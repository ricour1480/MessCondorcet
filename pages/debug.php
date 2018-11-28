<?php
$login='ricour@condorcet.be';
$mdp='021';
$test=new UtilisateursBD($cnx);
$connect=$test->verifUser($login, md5($mdp));
var_dump($connect);
?>

