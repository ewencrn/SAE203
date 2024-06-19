<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    } 
include_once("header.php");
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $confiserie = get_confis_by_id($_GET['confiserie_id']);
}

?>



    <div class="produit">
<div class="produit_top">
    <div class="texte_produit">
        <p class="nom_produit"> <?=$confiserie[0]["nom"] ?> </p>
    <div class="detail_produit">
        <p class="id"> Référence : <?=$confiserie[0]["id"]?> </p>
        <p class="type"> Type : <?=$confiserie[0]["type"]?> </p>

        <p class="prix"> <?=$confiserie[0]["prix"]?> €</p>
        <p class="description"> Description : <?=$confiserie[0]["description"]?> </p> 
    </div>

    </div>

    <img src="<?=SITEROOT?>assets/pictures/bergamote.png" class="img_produit">
    </div>
    <p class="histoire"> Depuis 1840, les seules, véritables, et authentiques Bergamottes de  Nancy, parfumées à l'essence naturelle de bergamotte, emballées  séparément, et rangées dans une grande boîte métallique ronde. </p>
</div>
</body>