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
    
}





?>