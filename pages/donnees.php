<?php
require './lib/php/verif_connexion.php';
$info_user= new UtilisateursBD($cnx);
$info_array = $info_user->getAllInfo($_SESSION['user']);
?>
<section class="content-header">
    <h1>Consultation de vos données</h1>
</section>
<br />

<section class="content-wrapper">
    <div class="row">
        <div class="col-sm-3">Nom :</div>
        <div class="col-sm-5"><b><?php print strtoupper($info_array[0]['nom']); ?></b></div>
    </div>
    <div class="row">
        <div class="col-sm-3">Prenom :</div>
        <div class="col-sm-5"><b><?php print strtoupper($info_array[0]['prenom']); ?></b></div>
    </div>
    <div class="row">
        <div class="col-sm-3">Login :</div>
        <div class="col-sm-5"><b><?php print $info_array[0]['login']; ?></b></div>
    </div>
    <div class="row">
        <div class="col-sm-3">Solde :</div>
        <div class="col-sm-5"><b><?php print $info_array[0]['credit']; ?> €</b></div>
    </div>
    <div class="row">
        <div class="col-sm-3">Mot de passe :</div>
        <div class="col-sm-5">
            <input type="password" id="zoneMDP" name="zoneMDP" placeholder="Nouveau mot de passe" />
            <small> * Seulement si vous souhaitez changer de  mot de passe</small>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-5">
            <button type="button" class="btn btn-info pull-right" id="updateMDP" name="updateMDP">Changer de mot de passe</button>
        </div>
    </div>
</section>

