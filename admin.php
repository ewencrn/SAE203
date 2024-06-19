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
<h2>Ajouter des utilisateurs</h2>
<?php
if(isset($_SESSION['message'])){ ?>
    <h3><?=$_SESSION['message']?></h3>
    <?php unset($_SESSION['message']) ?>
<?php
}
?>

<form method="post" action="<?=SITEROOT?>login/check_login.php">
    <label class="username" for="username">Username :</label>
        <input type="text" name="username" required>

    <label class="mdp" for="password">Mot de passe :</label>
    <input type="password" name="password" required>

    <label for="email">Adresse mail :</label>
    <input type="email" name="email" required>

    <label for="role">Role : </label>
    <select name="role" id="role" required>
    <option value="admin">Administrateur</option>
    <option value="gerant">Gérant</option>
    <option value="client">Client</option>
    </select>
    
    <label for="name">Nom :</label>
    <input type="text" name="name">

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required>

    <label for="ddn">Date de naissance :</label>
    <input type="date" name="ddn" required>
    <button class="button" type="submit" value="add_user" name="action">Ajouter l'utilisateur</button>
</form>

<h2>Voici toutes les boutiques : </h2>

<?php
$boutiques = get_all_boutique();

foreach($boutiques as $boutique){ ?>

    <section class="one_boutique">
    <div class="one_boutique_left">
    <h3>
        <?=$boutique["nom"]?>
    </h3>
    <p>
        <?=$boutique["numero_rue"]." ".$boutique["nom_adresse"]?>
    </p>
    <p>
            <?=$boutique["code_postal"]." ".$boutique["ville"] ?>
    </p>
    <a href="<?=SITEROOT?>script_admin.php?boutique=<?=$boutique["id"]?>&amp;action=delete">Supprimer cette boutique</a>
    </div>
    <div class="one_boutique_right">
        <img src="<?=SITEROOT?>assets/pictures/boutique.jpeg" alt="Photo de la boutique <?=$boutique["nom"]?>" class="boutique_img">
    </div>
</section>

<?php
}
?>

<h2>Ajouter une boutique</h2>

<form method="post" action="script_admin.php">
    <label for="nom">Nom de la boutique :</label>
    <input type="text" name="nom" required>

    <label for="utilisateur_id">Sélectionner le gérant : </label>
    <select name="utilisateur_id" id="utilisateur_id" required>

    <?php
    $all_gerant = select_all_gerant();
    foreach($all_gerant as $gerant){?>
        <option value="<?=$gerant['id']?>"><?=$gerant['nom'].' '.$gerant['prenom']?></option>
    <?php
    }
    ?>
    </select>

    
    <label for="numero_rue">Numéro de rue :</label>
    <input type="number" name="numero_rue" required>

    <label for="nom_adresse">Nom de l'adresse :</label>
    <input type="text" name="nom_adresse" required>

    <label for="code_postal">Code postal :</label>
    <input type="number" name="code_postal" required>

    <label for="ville">Ville :</label>
    <input type="text" name="ville" required>

    <label for="pays">Pays :</label>
    <input type="text" name="pays" required>
    <button type="submit" value="add_boutique" name="action">Ajouter la boutique</button>

</form>

<h2>Modifier la liste des bonbons disponibles pour les boutiques :</h2>
<form method="post" action="script_admin.php">
<label for="confiserie">Sélectionner un bonbon : </label>
<select name="confiserie" id="confiserie">
    <?php
    $confiseries = get_all_confis();
    foreach($confiseries as $one_confiserie){?>
        <option value="<?=$one_confiserie['id']?>"><?=$one_confiserie['nom']?></option>
    <?php
    }
    ?>
</select>
<button type="submit" name="action" value="delete_bonbon">Supprimer</button>
</form>

<form method="post" action="script_admin.php">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required>

    <label for="type">Type :</label>
    <select nom="type" id="type" required>
        <option value="Acide">Acide</option>
        <option value="Chocolat">Chocolat</option>
        <option value="Douceur">Douceur</option>
        <option value="Classique">Classique</option>
        <option value="Gourmandise">Gourmandise</option>
        <option value="Fruité">Fruité</option>
        <option value="Frais">Frais</option>
    </select>

    <label for="prix">Prix :</label>
    <input type="number" name="prix" required>

    <label for="description">Description : </label>
    <input type="text" name="description">

    <button type="submit" name="action" value="add_bonbon">Ajouter le produit</button>


</form>

<?php } ?>