<?php
include_once("db.php");

function get_confis_boutique($idBoutique){

    $confis = requete("SELECT confiseries.nom, stocks.quantite FROM confiseries 
    JOIN stocks ON confiseries.id = stocks.confiserie_id 
    JOIN boutiques ON stocks.boutique_id = boutiques.id
    where boutiques.id = $idBoutique");
    return $confis;
}

function get_all_confis(){ 
$allConfis= requete("SELECT * from confiseries");
return $allConfis;
}

function get_all_boutique(){

    $allBoutique = requete("SELECT * FROM boutiques");
    return $allBoutique;
}


function get_boutique_by_id($id){
    $boutique = requete("SELECT * FROM boutiques WHERE utilisateur_id = $id");
    return $boutique;
}

function get_stock_boutique($id){
    $stock = requete("SELECT * FROM stocks where boutique_id = $id");
    return $stock;
}

function get_confis_by_id($id){
    $details = requete("SELECT * FROM confiseries where id = $id");
    return $details;
}

function add_product($boutique_id, $confiserie_id, $quantite) {
    global $PDO;
    
    $stmt = $PDO->prepare("SELECT * FROM stocks WHERE boutique_id = :boutique_id AND confiserie_id = :confiserie_id");
    $stmt->bindParam(':boutique_id', $boutique_id);
    $stmt->bindParam(':confiserie_id', $confiserie_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $nouvelle_quantite = $result['quantite'] + $quantite;
        $stmt = $PDO->prepare("UPDATE stocks SET quantite = :quantite, date_de_modification = NOW() WHERE id = :id");
        $stmt->bindParam(':quantite', $nouvelle_quantite);
        $stmt->bindParam(':id', $result['id']);
    } else {
        $stmt = $PDO->prepare("INSERT INTO stocks (boutique_id, confiserie_id, quantite, date_de_modification) VALUES (:boutique_id, :confiserie_id, :quantite, NOW())");
        $stmt->bindParam(':boutique_id', $boutique_id);
        $stmt->bindParam(':confiserie_id', $confiserie_id);
        $stmt->bindParam(':quantite', $quantite);
    }
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function remove_product($boutique_id, $confiserie_id, $quantite) {
    global $PDO;

    $stmt = $PDO->prepare("SELECT * FROM stocks WHERE boutique_id = :boutique_id AND confiserie_id = :confiserie_id");
    $stmt->bindParam(':boutique_id', $boutique_id);
    $stmt->bindParam(':confiserie_id', $confiserie_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $nouvelle_quantite = $result['quantite'] - $quantite;
        if ($nouvelle_quantite < 0) {
            $nouvelle_quantite = 0; 
        }
        $stmt = $PDO->prepare("UPDATE stocks SET quantite = :quantite, date_de_modification = NOW() WHERE id = :id");
        $stmt->bindParam(':quantite', $nouvelle_quantite);
        $stmt->bindParam(':id', $result['id']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    } else {
        return false; 
    }
}



?>