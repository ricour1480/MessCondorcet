
<h1>Formulaire de connexion</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Pour vous connecter, veuillez introduire votre login et votre mot de passe Condorcet et sélectionner votre status</li>
  </ol>
</nav>

<div id="form-connexion">
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label"><b>Login :</b></label>
        <div class="col-sm-5">
            <input type="text"  name="login" id="login" pattern="[A-Za-z0-9._%+-]+@condorcet+\.be$"/> *
        </div>
    </div>
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label"><b>Mot de passe:</b></label>
        <div class="col-sm-5">
            <input type="password"  name="password" id="password"/> *
        </div>
    </div>
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label"><b>Status:</b></label>
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

