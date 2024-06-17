<?php
include_once ("db.php");
include_once ("header.php");


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $boutique_id = $_GET['boutique'];
    $action = $_GET['action'];

    if ($action === "delete") {
        $_SESSION['message'] = delete_boutique($boutique_id);
        header("Location: admin.php");
        exit;
    }

} 
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] === 'add_boutique') {
        $nom = $_POST['nom'];
        $utilisateur_id = $_POST['utilisateur_id'];
        $numero_rue = $_POST['numero_rue'];
        $nom_adresse = $_POST['nom_adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $_SESSION['message'] = add_boutique($nom, $utilisateur_id, $numero_rue, $nom_adresse, $code_postal, $ville, $pays);
        header("Location: admin.php");
        exit;
    } else {
        header("Location: admin.php");
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}

?>