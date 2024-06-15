<?php
include_once('header.php');
include_once('db.php');

if(isset($_SESSION["role"])){
    if($_SESSION["role"]!="gerant"){
        header("location:".SITEROOT."index.php");
    }
}
else{
    header("location:".SITEROOT."index.php");
}

get_stock_boutique($_SESSION["boutique_id"]);

?>

<h2>Voici les stocks de la boutiques : </h2>


<?php
if(isset($_SESSION["message"])){
    echo($_SESSION["message"]);
}
$stock = get_stock_boutique($_SESSION["boutique_id"]);
foreach($stock as $oneStock){ 
    $all_info_bonbon = get_confis_by_id($oneStock["confiserie_id"]);?>

<div class="produit_bonbon">
        <img src="<?= SITEROOT ?>assets/pictures/berlingot.png" class="image_bonbon">
        <p class="nom_bonbon"><?= $all_info_bonbon[0]["nom"] ?></p>
        <p class="stock_bonbon"><?= $oneStock["quantite"] ?> produits disponibles</p>
        
        <form method="post" action="script_gestion_stock.php">
            <input type="number" name="quantite" value="1">
            <input type="hidden" name="confiserie_id" value="<?= $oneStock['confiserie_id'] ?>">
            <button type="submit" name="action" value="ajouter">
                <img src="<?= SITEROOT ?>assets/icons/add.png" alt="Bouton ajouter">
            </button>
            <button type="submit" name="action" value="retirer">
                <img src="<?= SITEROOT ?>assets/icons/moins.png" alt="Bouton retirer">
            </button>
        </form>
    </div>
<?php
}
?>

