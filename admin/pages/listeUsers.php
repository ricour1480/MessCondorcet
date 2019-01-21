<?php
require './lib/php/verif_connexionAdmin.php';
$user = new UtilisateursBD($cnx);
$liste_user = $user->getAllUser();
$nbrUser = count($liste_user);
?>
<section class="content-header">
    <h1>Liste des utilisateurs</h1>
</section>
<section class="content-wrapper">
    <ul class="breadcrumb">
        <li class="breadcrumb-item rouge">Depuis cette liste, vous pouvez ajouter le montant données par l'étudiant à son compte</li>
    </ul>
<!--    <div id="searchBoxUser" class="col-sm-5">Chercher un utilisateur :
        <input type="text" id="searchUser" placeholder="Entrer quelque chose"/>
    </div>-->
    <div id="liste_user" class="table-wrapper-scroll-y">
        <table class="table table-bordered table-striped" id="table_user">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Solde ( en € )</th>
                <th scope="col">Montant à ajouté</th>
                <th scope="col">Validation du changement</th>
            </tr>
            <?php
            for($i=0; $i<$nbrUser;$i++) {
                echo "<tr><td>".$liste_user[$i]['nom']."</td><td>".$liste_user[$i]['prenom']."</td><td>".$liste_user[$i]['credit']."</td>".
                     "<td><input type='number' disabled id='montant".$liste_user[$i]['id_user']."' min='0' />&nbsp;<input type='button' class='btn btn-info'  onclick='EnableArea(".$liste_user[$i]['id_user'].");' id='EnableZone' value='Activer/Desactiver'/></td>".
                     "<td><input type='button' id='validchangement'class='btn btn-info' onclick='valid(".$liste_user[$i]['id_user'].");' value='Valider'/> </td></tr>";
            }
            ?>
        </table>
    </div>
</section>

