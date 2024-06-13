<?php
include_once("db.php");

function get_confis_boutique($idBoutique){

    $confis = requete("SELECT confiseries.id, confiseries.nom, confiseries.type, confiseries.prix, confiseries.description FROM confiseries 
    JOIN stocks ON confiseries.id = stocks.confiserie_id 
    JOIN boutiques ON stocks.boutique_id = boutiques.id
    where boutiques.id = $idBoutique");

    return $confis;
}









?>