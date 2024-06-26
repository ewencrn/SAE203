<?php 
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }
include_once("const.php");
include_once("functions.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La confiserie</title>
    <link rel="stylesheet" href="<?=SITEROOT?>styles/style.css">
    <link rel="stylesheet" href="<?=SITEROOT?>styles/catalogue.css">
    <link rel="stylesheet" href="<?=SITEROOT?>styles/produit.css">
    <link rel="stylesheet" href="<?=SITEROOT?>styles/boutiques.css">
    <link rel="stylesheet" href="<?=SITEROOT?>styles/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">



    </head>
<body>
    <header>
        <nav>
                <svg data-v-f0f9cf0e="" viewBox="0 0 200 200" class="burger medium">
                <g class="group group-1" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px;" data-svg-origin="100 100" transform="matrix(1,0,0,1,0,-27)">
                <line class="hand hand-1" x1="0" y1="100" x2="100" y2="100" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px;" data-svg-origin="100 100" transform="matrix(1,0,0,1,0,0)"></line>
                <line class="hand hand-4" x1="100" y1="100" x2="200" y2="100" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px;" data-svg-origin="100 100" transform="matrix(1,0,0,1,0,0)"></line>
                </g>
                <g class="group group-2" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px;" data-svg-origin="100 100" transform="matrix(1,0,0,1,0,27)">
                <line class="hand hand-2" x1="0" y1="100" x2="100" y2="100" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px;" data-svg-origin="100 100" transform="matrix(1,0,0,1,0,0)"></line>
                <line class="hand hand-3" x1="100" y1="100" x2="200" y2="100" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke" style="translate: none; rotate: none; scale: none; transform-origin: 0px 0px;" data-svg-origin="100 100" transform="matrix(1,0,0,1,0,0)"></line>
                </g>
                </svg>
                <a href="<?=SITEROOT?>catalogue.php" class="produit_nav">Produits</a>
                <a href="<?=SITEROOT?>boutiques.php" class="boutiques_nav">Boutiques</a>
                <a href="<?=SITEROOT?>index.php"><img src="<?=SITEROOT?>assets/pictures/logo_background.png" alt="Logo du site La confiserie" class="logo"></a>
                <a>Notre histoire</a>
                <?php
                    if(isset($_SESSION["loggedin"]) AND $_SESSION["role"]==="gerant"){
                        echo("<a href=".SITEROOT."gestion.php>Gérer votre boutique</a>");
                    }
                    elseif(isset($_SESSION["loggedin"]) AND $_SESSION["role"]==="admin"){
                        echo("<a href=".SITEROOT."admin.php>Panel d'administration</a>");
                    }
                ?>
                <img src="<?=SITEROOT?>assets/icons/cart.png" alt="Icone panier">
                <?php
                if(isset($_SESSION["role"])){
                    echo('<a href="'.SITEROOT.'login/disconnect.php"><img src="'.SITEROOT.'assets/icons/deconnect.png" alt="Se Déconnecter"></a>');

                }
                else {
                    echo('<a href="'.SITEROOT.'login/login.php"><img src="'.SITEROOT.'assets/icons/profil.png" alt="Se connecter"></a>');
                }
                ?>
                
        </nav>
    </header>






