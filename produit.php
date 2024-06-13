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


