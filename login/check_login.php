<?php
include_once("../db.php");
include_once("../header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['action']==='login'){
    $username = $_POST['nom'];
    $mdp = md5($_POST['mdp']);


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
        if($result["role"]==="gerant"){
            $boutique_info= get_boutique_by_id($_SESSION['id']);
            $_SESSION["boutique_id"]=$boutique_info[0]["id"];
        }
        header("location:../boutiques.php");
        exit;
    } 
    else {
        $stmt = $PDO->prepare("SELECT * FROM utilisateurs WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION["message"] = "Mauvais mot de passe";
        } else {
            $_SESSION["message"] = "Utilisateur inconnu";
        }
        header("location:".SITEROOT."login/login.php");
        exit;
    }
}


elseif($_POST['action']==='add_user'){
        $action = $_POST['action'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $mail = $_POST['email'];
        if(isset($_POST['role'])){
            $role = $_POST['role'];
        }
        else{
            $role = 'client';
        }
        $name = $_POST['name'];
        $prenom = $_POST['prenom'];
        $ddn = $_POST['ddn'];
        $_SESSION['message'] = add_user($username, $password, $mail, $role, $name, $prenom, $ddn);
         
        header("Location:".SITEROOT."login/login.php"); 
        exit;
    }
}
    ?>
