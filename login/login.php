<?php
include_once("../header.php")
?>
<div class="test">
<form method="post" action="check_login.php">
    <label for="nom">Nom d'utilisateur</label>
    <input type="text" name="nom" required>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" required>
    <input type="submit" value="Se connecter">

</form>

<?php if(isset($_SESSION["error"])){
echo("<p>".$_SESSION["error"]."</p>");
unset($_SESSION["error"]);
}
?>
</div>