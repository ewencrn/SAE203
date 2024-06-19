<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }
include_once("header.php")

?>

<section class="promote">
<div class="promote_left">
    <h1 class="promote_title">Bergamote de Nancy</h1>
    <button class="button">DECOUVRIR</button>
</div>
<img src="<?=SITEROOT?>assets/pictures/bergamote.png" alt="Bergamote de Nancy" class="promote_img">
</section>

<section class="artisanat ">
    <img src="<?=SITEROOT?>assets/pictures/artisant_nougat.jpg" alt="Image d'un de nos artisans au travail" class="img_artisant">
    <div class="artisanat_right ">
        <p class="text_artisant">Depuis 1847, notre maison prépare avec passion et savoir-faire toutes nos sucreries</p>
        <button class="button" id="b_esp">EN SAVOIR PLUS</button>
    </div>
</section>

<section class="all_product">

<div class="all_product_left">
    <h2 class="titre_all_product_left">Découvrez nos produits</h2>

    <div class="link">
    <div class="line"></div>
    <p>Nougats</p>
    </div>

    <div class="link">
    <div class="line"></div>
    <p>Caramels</p>
    </div>

    <div class="link">
    <div class="line"></div>
    <p>Sucettes</p>
    </div>
    <div class="link">
    <div class="line"></div>
    <p>Guimauves</p>
    </div>
</div>

<div class="all_product_right">
    <div class="radial"></div>
    <img src="<?=SITEROOT?>assets/pictures/bergamote.png" alt="Image d'une bergamote" class="img_product">
</div>


</section>