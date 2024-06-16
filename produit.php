<?php include_once("header.php");
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $confiserie = get_confis_by_id($_GET['confiserie_id']);
    print_r($confiserie); 
}

?>



    <div class="produit">
<div class="produit_top">
    <div class="texte_produit">
        <p class="nom_produit"> <?=$confiserie[0]["nom"] ?> </p>
        <p class="id"> Id : <?=$confiserie[0]["id"]?> </p>
        <p class="quantite"> <?=$confiserie[0]["type"]?> </p>
        <p class="prix"> <?=$confiserie[0]["prix"]?> </p>
        <p class="par_kg"> <?=$confiserie[0]["description"]?> </p>  
    </div>

    <img src="<?=SITEROOT?>assets/pictures/bergamote.png" class="img_produit">
    </div>
    <p class="histoire"> Depuis 1840, les seules, véritables, et authentiques Bergamottes de  Nancy, parfumées à l'essence naturelle de bergamotte, emballées  séparément, et rangées dans une grande boîte métallique ronde. </p>
</div>
</body>