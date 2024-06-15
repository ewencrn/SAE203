<?php 
include_once("header.php")
?>

<div class="all_boutique">



    <?php
    $allBoutique = get_all_boutique();
    foreach($allBoutique as $boutique ){?>
    
    <section class="one_boutique">
        <div class="one_boutique_left">
        <h3>
            <?=$boutique["nom"]?>
        </h3>
        <p>
            <?=$boutique["numero_rue"]." ".$boutique["nom_adresse"]?>
        </p>
        <p>
                <?=$boutique["code_postal"]." ".$boutique["ville"] ?>
        </p>
        <a href="<?=SITEROOT?>catalogue.php?boutique=<?=$boutique["id"]?>">Choisir cette boutique</a>
        </div>
        <div class="one_boutique_right">
            <img src="<?=SITEROOT?>assets/pictures/boutique.jpeg" alt="Photo de la boutique Mika Line" class="boutique_img">
        </div>
    </section>
    <?php } ?>



</div>