<?php
include_once("../db.php");
include_once("../header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nom'];
    $mdp = md5($_POST['mdp']);
}

    global $PDO;
    $stmt = $PDO->prepare("SELECT * FROM utilisateurs WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $mdp);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $_SESSION["username"] = $result["username"];
        $_SESSION["role"] = $result["role"];
        $_SESSION['loggedin'] = true;
        $_SESSION['id']=$result['id'];
        header("location:../boutiques.php");
        exit;
    } 
    else {
        $stmt = $PDO->prepare("SELECT * FROM utilisateurs WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION["error"] = "Mauvais mot de passe";
        } else {
            $_SESSION["error"] = "Utilisateur inconnu";
        }
        header("location:".SITEROOT."login/login.php");
        exit;
    }




    ?>
