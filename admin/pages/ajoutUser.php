<?php
require './lib/php/verif_connexionAdmin.php';
/*extract($_POST,EXTR_OVERWRITE);
if(isset($adduser)){
    $erreur="";
    $nom=trim($nom);
    $prenom=trim($prenom);
    $cleSecrete=hash("sha256","ZxN5KjRzSEOcWSxLJSWbLyjKGTHH0VKscbeilnR9YAqeO9zKhguOxc2HhW4GZ00lZje8ecHJAoM1Nmlpx7k2riQJl55VFY53CLfTdAhWphDkpsZbN46q1oWN");
    $log=trim(strtolower($log));
    $mdp= crypt(trim($passuser), $cleSecrete);
    $utilisateur= new UtilisateursBD($cnx);
    if(intval($credit)< 20){
        $erreut="Credit insuffisant";
    }else{
        $insert=$utilisateur->AjoutUtilisateur($nom, $prenom, $log, $mdp, $credit);
    }
    
}*/
?>
<section class="content-header">
    <h1>Ajouter un nouvelle utilisateur :
        <small>formulaire d'ajout du formulaire</small>
    </h1>
</section>
 <ul class="breadcrumb">
        <li class="breadcrumb-item rouge"> les champs suivis de * sont <b>obligatoires</b></li>
</ul>
<section class="content">
    <div class="formulaire">
            <div class="form-group row">
                <label for="nom" class="col-sm-3">Nom :</label>
                <div class="col-sm-6">
                    <input type="text" name="nom" required id="nom"/> *
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-sm-3">Prenom :</label>
                <div class="col-sm-6">
                    <input type="text" name="prenom" required id="prenom"/> *
                </div>
            </div>
            <div class="form-group row">
                <label for="log" class="col-sm-3">Login :</label>
                <div class="col-sm-6">
                    <input type="text" name="log" required id="log" pattern="[a-z0-9._%+-]+@condorcet+\.be$"/> *
                </div>
            </div>
            <div class="form-group row">
                <label for="mdp" class="col-sm-3">Mot de passe :</label>
                <div class="col-sm-6">
                    <input type="password" name="passuser"  required id="passuser"/> *
                </div>
            </div>
            <div class="form-group row">
                <label for="credit" class="col-sm-3">Somme versée :</label>
                <div class="col-sm-6">
                    <input type="number" name="credit" required id="credit"/> *
                </div>
                <div class="col-sm-2" id="erreurcredit"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 ">
                    <button class="btn btn-light pull-right" name="adduser" id="adduser">Ajouter</button>
                </div>
            </div>
    </div>
</section>

