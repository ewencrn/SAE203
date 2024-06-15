<?php include_once("header.php") ?>

<?php
if (isset($_GET["boutique"])){
$allProductFromBoutique = get_confis_boutique($_GET["boutique"]);
$allConfis = get_all_confis();


        $boutiqueStock = array();
        foreach ($allProductFromBoutique as $product) {
            $boutiqueStock[$product['nom']] = $product['quantite'];
        }
    
        foreach ($allConfis as $produit) {
            echo '<div class="produit_bonbon">
                    <img src="'.SITEROOT.'assets/pictures/berlingot.png" class="image_bonbon">
                    <p class="nom_bonbon">'.$produit["nom"].'</p>
                    <p class="stock_bonbon">';
    
            if (array_key_exists($produit['nom'], $boutiqueStock)) {
                $quantite = $boutiqueStock[$produit['nom']];
                if ($quantite <= 0) {
                    echo "En rupture de stock";
                } else {
                    echo "En stock";
                }
            } else {
                echo "En rupture de stock";
            }
    
            echo '</p></div>';
        }
    }
else {
    header('Location: boutiques.php');
    exit;
}
?>
?>

