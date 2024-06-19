<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }
include_once("const.php");
include_once("db.php");
if(!isset($_SESSION["role"])){
    header("location:".SITEROOT."index.php");
}
else{
    if($_SESSION["role"]!="admin"){
        header("location:".SITEROOT."index.php");
    }



include_once('header.php')
?>
<h2 class="ajt">Ajouter des utilisateurs</h2>
<?php
if(isset($_SESSION['message'])){ ?>
    <h3><?=$_SESSION['message']?></h3>
    <?php unset($_SESSION['message']) ?>
<?php
}
?>

<form class="ajt_utilisateur" method="post" action="<?=SITEROOT?>login/check_login.php">
    <div class="donnee_ajt">
    
    <div class="role_choix">
    <label class="mdp" for="username">Username :</label>
        <input type="text" name="username" required>
</div>

        <div class="role_choix">
    <label class="mdp" for="password">Mot de passe :</label>
    <input type="password" name="password" required>
</div>

    <div class="role_choix">
    <label class="mdp" for="email">Adresse mail :</label>
    <input type="email" name="email" required>
</div>

    <div class="role_choix">
    <label class="mdp" for="role">Role : </label>
    <select name="role" id="type" required>
    <option class="mdp" value="admin">Administrateur</option>
    <option class="mdp" value="gerant">Gérant</option>
    <option class="mdp" value="client">Client</option>
    </select>
</div>

<div class="role_choix">
    <label class="mdp" for="name">Nom :</label>
    <input type="text" name="name">
</div>

<div class="role_choix">
    <label class="mdp" for="prenom">Prénom :</label>
    <input type="text" name="prenom" required>
</div>

<div class="role_choix">
    <label class="mdp" for="ddn">Date de naissance :</label>
    <input type="date" name="ddn" required>
</div>

<div class="role_choix">
    <button class="button_ajt" type="submit" value="add_user" name="action">Ajouter l'utilisateur</button>
</div>

</div>
</form>

<h2 class="ajt">Voici toutes les boutiques : </h2>

<div class="all_boutique">

<?php
$boutiques = get_all_boutique();

foreach($boutiques as $boutique){ ?>

    <section class="one_boutique">
    <div class="one_boutique_left">
    <h3 class="nom_boutique">
        <?=$boutique["nom"]?>
    </h3>
    <p class="rue_boutique">
        <?=$boutique["numero_rue"]." ".$boutique["nom_adresse"]?>
    </p>
    <p class="cp_boutique">
            <?=$boutique["code_postal"]." ".$boutique["ville"] ?>
    </p>
    <a class="choix_boutique" href="<?=SITEROOT?>script_admin.php?boutique=<?=$boutique["id"]?>&amp;action=delete">Supprimer cette boutique</a>
    </div>
    <div class="one_boutique_right">
        <img src="<?=SITEROOT?>assets/pictures/boutique.jpeg" alt="Photo de la boutique <?=$boutique["nom"]?>" class="boutique_img">
    </div>
</section>

<?php
}
?>
</div>

<h2 class="ajt">Ajouter une boutique</h2>

<form method="post" action="script_admin.php">

<div class="role_choix">
    <label class="mdp"for="nom">Nom de la boutique :</label>
    <input type="text" name="nom" required>
</div>

<div class="role_choix">
    <label class="mdp" for="utilisateur_id">Sélectionner le gérant : </label>
    <select id="type" name="utilisateur_id" id="utilisateur_id" required>
</div>


<div class="role_choix">
    <?php
    $all_gerant = select_all_gerant();
    foreach($all_gerant as $gerant){?>
        <option value="<?=$gerant['id']?>"><?=$gerant['nom'].' '.$gerant['prenom']?></option>
    <?php
    }
    ?>
    </select>
</div>
    
<div class="role_choix">
    <label class="mdp" for="numero_rue">Numéro de rue :</label>
    <input type="number" name="numero_rue" required>
</div>


<div class="role_choix">
    <label class="mdp" for="nom_adresse">Nom de l'adresse :</label>
    <input type="text" name="nom_adresse" required>
</div>

<div class="role_choix">
    <label class="mdp" for="code_postal">Code postal :</label>
    <input type="number" name="code_postal" required>
</div>

<div class="role_choix">
    <label class="mdp" for="ville">Ville :</label>
    <input type="text" name="ville" required>
</div>

<div class="role_choix">
    <label class="mdp"for="pays">Pays :</label>
    <input type="text" name="pays" required>
    <button class="button_ajt" type="submit" value="add_boutique" name="action">Ajouter la boutique</button>
</div>

</form>

<h2 class="ajt">Modifier la liste des bonbons disponibles pour les boutiques :</h2>
<div class="modif">
<form method="post" action="script_admin.php">

<div class="role_choix">
<label class="mdp" for="confiserie">Sélectionner un bonbon : </label>
<select name="confiserie" id="type">
    <?php
    $confiseries = get_all_confis();
    foreach($confiseries as $one_confiserie){?>
        <option class="button_choix_admin" value="<?=$one_confiserie['id']?>"><?=$one_confiserie['nom']?></option>
    <?php
    }
    ?>
</select>

<div class="role_choix">
<button class="button_supp" type="submit" name="action" value="delete_bonbon">Supprimer</button>
</div>

</form>
</div>

<div class="role_choix">
<form method="post" action="script_admin.php">
    <label class="mdp" for="nom">Nom :</label>
    <input type="text" name="nom" required>
</div>

<div class="role_choix">
    <label class="mdp" for="type">Type :</label>
    <select class="button_choix_admin" nom="type" id="type" required>
        <option value="Acide">Acide</option>
        <option value="Chocolat">Chocolat</option>
        <option value="Douceur">Douceur</option>
        <option value="Classique">Classique</option>
        <option value="Gourmandise">Gourmandise</option>
        <option value="Fruité">Fruité</option>
        <option value="Frais">Frais</option>
    </select>
</div>  

<div class="role_choix">
    <label class="mdp" for="prix">Prix :</label>
    <input type="number" name="prix" required>
</div>

<div class="role_choix">
    <label class="mdp" for="description">Description : </label>
    <input type="text" name="description">
</div>

<div class="role_choix">
    <button class="button_ajt" type="submit" name="action" value="add_bonbon">Ajouter le produit</button>
</div>

</form>
</div>

<?php } ?>