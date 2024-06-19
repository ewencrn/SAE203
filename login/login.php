<?php
include_once("../header.php");
?>
<h2 class="ajt">Se connecter</h2>
<div class="test">

<div class="role_choix">
<form method="post" action="check_login.php">
    <label class="mdp"for="nom">Nom d'utilisateur</label>
    <input type="text" name="nom" required>
</div>

<div class="role_choix">
    <label class="mdp" for="mdp">Mot de passe</label>
    <input type="password" name="mdp" required>
</div>

<div class="role_choix">
    <input class="button_ajt" type="submit" name='action' value="login">
</div>

</form>
</div>
</div>
 
<?php if(isset($_SESSION["message"])){
echo("<p>".$_SESSION["message"]."</p>");
unset($_SESSION["message"]);
}
?>
</div>
<h2 class="ajt">Créer un compte</h2>
<div class="test">
    <div class="login_ajt">

    <div class="role_choix">
<form method="post" action="<?=SITEROOT?>login/check_login.php">
    <label class="mdp" for="username">Username :</label>
        <input type="text" name="username" required>
</div>

<div class="role_choix">
    <label class="mdp"for="password">Mot de passe :</label>
    <input type="password" name="password" required>
</div>

<div class="role_choix">
    <label class="mdp"for="email">Adresse mail :</label>
    <input type="email" name="email" required>
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
    <button class="button_ajt" type="submit" value="add_user" name="action">Créer un compte</button>
</div>

</form>
</div>
</div>
