<?php 
include_once("header.php")
?>

<div class="all_boutique">



    <?php
    $allBoutique = get_all_boutique();
    foreach($allBoutique as $boutique ){?>
    
    <section class="one_boutique">
        <div class="one_boutique_left">
        <h3 class="nom_boutique">
            <?=$boutique["nom"]?>
        </h3>
        <p class="rue_boutique">
            <?=$boutique["numero_rue"]." ".$boutique["nom_adresse"]?>
        </p>
        <p class="cp_boutique">
            <?=$boutique["code_postal"]." ".$boutique["ville"] ?>
        </p>
        <a class="choix_boutique" href="<?=SITEROOT?>catalogue.php?boutique=<?=$boutique["id"]?>">Choisir cette boutique</a>
        </div>
        <div class="one_boutique_right">
            <img src="<?=SITEROOT?>assets/pictures/boutique.jpeg" alt="Photo de la boutique Mika Line" class="boutique_img">
        </div>
    </section>
    <?php } ?>



</div>