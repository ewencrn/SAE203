<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }
include_once("db.php");
include_once("header.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $confiserie_id = $_POST['confiserie_id'];
    $quantite = $_POST['quantite'];
    $boutique_id = $_SESSION['boutique_id'];

    if ($action == 'ajouter') {
        if (add_product($boutique_id, $confiserie_id, $quantite)) {
            $_SESSION['message'] = "Produit ajouté avec succès!";
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout du produit.";
        }
    } 
    elseif ($action == 'retirer') {
        if (remove_product($boutique_id, $confiserie_id, $quantite)) {
            $_SESSION['message'] = "Produit retiré avec succès!";
        } else {
            $_SESSION['message'] = "Erreur lors du retrait du produit.";
        }
    } else {
        $_SESSION['message'] = "Action inconnue.";
    }
    header("Location: gestion.php"); 
    exit;
}

?>