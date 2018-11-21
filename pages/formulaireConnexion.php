<?php
extract($_POST,EXTR_OVERWRITE);
if(isset($soumettre)){
    $us=new UtilisateursBD($cnx);
    $result=$us->verifUser($login, $password);
    var_dump($result);
}
?>
<h1>Formulaire de connexion</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Pour vous connecter, veuillez introduire votre login et votre mot de passe Condorcet et selectionner votre status</li>
  </ol>
</nav>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
<div id="form-connexion">
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label"><b>Login :</b></label>
        <div class="col-sm-5">
            <input type="text"  name="login" id="login"/> *
        </div>
    </div>
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label"><b>Mot de passe:</b></label>
        <div class="col-sm-5">
            <input type="password"  name="password" id="password"/> *
        </div>
    </div>
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label"><b>Role:</b></label>
        <div class="col-sm-5">
            <select name="role" id="role">
                <option value="user">étudiant</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-5">
            <button class="btn btn-light pull-right" id="soumettre" name="soumettre">Se connecter</button>
        </div>
    </div>
</div>
</form>

