<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }
if (!isset($_GET["boutique"])) {
    include_once("const.php");
    header('location:' . SITEROOT . 'boutiques.php');
    exit();
}else{
include_once ("header.php");
?>
<div class="filter-bar">
    <label class="filter-type" for="filter-stock">Afficher :</label>
    <select id="filter-stock">
        <option value="all">Tous</option>
        <option value="in-stock">En stock</option>
    </select>
    <label class="filter-type" for="filter-type">Type :</label>
    <select id="filter-type">
        <option value="all">Tous</option>
        <option value="Acide">Acide</option>
        <option value="Chocolat">Chocolat</option>
        <option value="Douceur">Douceur</option>
        <option value="Classique">Classique</option>
        <option value="Gourmandise">Gourmandise</option>
        <option value="Fruité">Fruité</option>
        <option value="Frais">Frais</option>
    </select>
    </div>
<div class="container">
    <?php
        $allProductFromBoutique = get_confis_boutique($_GET["boutique"]);
        $allConfis = get_all_confis();


        $boutiqueStock = array();
        foreach ($allProductFromBoutique as $product) {
            $boutiqueStock[$product['nom']] = $product['quantite'];
        }

        foreach ($allConfis as $produit) {
            if (array_key_exists($produit['nom'], $boutiqueStock)) {
                $quantite = $boutiqueStock[$produit['nom']];
                if ($quantite <= 0) {
                    echo '
                    <div class="produit_bonbon" data-type="' . $produit['type'] . '">
                    <img src="' . SITEROOT . 'assets/pictures/berlingot.png" class="image_bonbon">
                    <p class="nom_bonbon">' . $produit["nom"] . '</p>
                    <p class="stock_bonbon">En rupture de stock"<p>
                    <p class="stock_bonbon">Catégorie : ' . $produit['type'] . '<p>
                    </div>
                    ';
                } else {
                    echo '<a href=' . SITEROOT . 'produit.php?confiserie_id=' . $produit['id'] . '>
                    <div class="produit_bonbon stock" data-type="' . $produit['type'] . '">
                    <img src="' . SITEROOT . 'assets/pictures/berlingot.png" class="image_bonbon">
                    <p class="nom_bonbon">' . $produit["nom"] . '</p>
                    <p class="stock_bonbon">En stock<p>
                    <p class="stock_bonbon">Catégorie : ' . $produit['type'] . '<p>
                    </div>
                    </a>';
                }
            } else {
                echo '
                    <div class="produit_bonbon " data-type="' . $produit['type'] . '">
                    <img src="' . SITEROOT . 'assets/pictures/berlingot.png" class="image_bonbon">
                    <p class="nom_bonbon">' . $produit["nom"] . '</p>
                    <p class="stock_bonbon">En rupture de stock</p>
                    <p class="stock_bonbon">Catégorie : ' . $produit['type'] . '<p>
                    </div>
                    ';
            }


        }
}   
    ?>
</div>
<script>function filterProducts() {
    var stockFilterValue = document.getElementById('filter-stock').value;
    var typeFilterValue = document.getElementById('filter-type').value;
    var produits = document.querySelectorAll('.produit_bonbon');

    produits.forEach(function(produit) {
        var isInStock = produit.classList.contains('stock');
        var productType = produit.getAttribute('data-type');

        var stockMatch = (stockFilterValue === 'all') || (stockFilterValue === 'in-stock' && isInStock);
        
        var typeMatch = (typeFilterValue === 'all') || (typeFilterValue === productType);

        if (stockMatch && typeMatch) {
            produit.style.display = 'block';
        } else {
            produit.style.display = 'none';
        }
    });
}

document.getElementById('filter-stock').addEventListener('change', filterProducts);
document.getElementById('filter-type').addEventListener('change', filterProducts);
</script>