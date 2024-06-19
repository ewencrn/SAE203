<?php
include_once("../header.php");
?>
<h2 class="ajt">Se connecter</h2>
<div class="test">
<form method="post" action="check_login.php">
    <label class="mdp"for="nom">Nom d'utilisateur</label>
    <input type="text" name="nom" required>
    <label class="mdp" for="mdp">Mot de passe</label>
    <input type="password" name="mdp" required>
    <input class="button_ajt" type="submit" name='action' value="login">

</form>
 
<?php if(isset($_SESSION["message"])){
echo("<p>".$_SESSION["message"]."</p>");
unset($_SESSION["message"]);
}
?>
</div>
<h2 class="ajt">Créer un compte</h2>
<div class="test">
<form method="post" action="<?=SITEROOT?>login/check_login.php">
    <label class="mdp" for="username">Username :</label>
        <input type="text" name="username" required>

    <label class="mdp"for="password">Mot de passe :</label>
    <input type="password" name="password" required>

    <label class="mdp"for="email">Adresse mail :</label>
    <input type="email" name="email" required>
    
    <label class="mdp" for="name">Nom :</label>
    <input type="text" name="name">

    <label class="mdp" for="prenom">Prénom :</label>
    <input type="text" name="prenom" required>

    <label class="mdp" for="ddn">Date de naissance :</label>
    <input type="date" name="ddn" required>
    <button class="button_ajt" type="submit" value="add_user" name="action">Créer un compte</button>
</form>

</div>
