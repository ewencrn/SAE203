<?php include_once("header.php") ?>

<body>
    <div class="produit_bonbon">
                <img src="<?=SITEROOT?>assets/pictures/berlingot.png" class="image_bonbon">
                <p class="nom_bonbon">Berlingot </p>
                <p class="stock_bonbon">En stock</p>
    </div>
</body>

<?php

$allProduct = get_confis_boutique(2);

foreach($allProduct as $produit){
    echo('
    <div class="produit_bonbon">
    <img src="<?=SITEROOT?>assets/pictures/berlingot.png" class="image_bonbon">
    <p class="nom_bonbon">Berlingot </p>
    <p class="stock_bonbon">En stock</p>
</div>
');
}


?>

    <div class="produit">
    <div class="texte_produit">
        <p class="nom_produit"> Bergamote de Nançy </p>
        <p class="id"> Id : 165842 </p>
        <p class="quantite"> Boîte de 300g </p>
        <p class="prix"> 25,50€ </p>
        <p class="par_kg"> (77,27€ par Kg) </p>
        <p class="histoire"> Depuis 1840, les seules, véritables, et authentiques Bergamottes de  Nancy, parfumées à l'essence naturelle de bergamotte, emballées  séparément, et rangées dans une grande boîte métallique ronde. </p>
    </div>
    <img src="<?=SITEROOT?>assets/pictures/bergamote.png" class="img_produit">

    </div>
