<?php
include_once("../header.php");
?>
<h2>Se connecter</h2>
<div class="test">
<form method="post" action="check_login.php">
    <label for="nom">Nom d'utilisateur</label>
    <input type="text" name="nom" required>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" required>
    <input type="submit" name='action' value="login">

</form>
 
<?php if(isset($_SESSION["message"])){
echo("<p>".$_SESSION["message"]."</p>");
unset($_SESSION["message"]);
}
?>
</div>
<h2>Créer un compte</h2>
<div class="test">
<form method="post" action="<?=SITEROOT?>login/check_login.php">
    <label for="username">Username :</label>
        <input type="text" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>

    <label for="email">Adresse mail :</label>
    <input type="email" name="email" required>
    
    <label for="name">Nom :</label>
    <input type="text" name="name">

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required>

    <label for="ddn">Date de naissance :</label>
    <input type="date" name="ddn" required>
    <button type="submit" value="add_user" name="action">Créer un compte</button>
</form>

</div>
