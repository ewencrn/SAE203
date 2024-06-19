<?php
include_once ("db.php");

function get_confis_boutique($idBoutique)
{

    $confis = requete("SELECT confiseries.nom, stocks.quantite FROM confiseries 
    JOIN stocks ON confiseries.id = stocks.confiserie_id 
    JOIN boutiques ON stocks.boutique_id = boutiques.id
    where boutiques.id = $idBoutique");
    return $confis;
}

function get_all_confis()
{
    $allConfis = requete("SELECT * from confiseries");
    return $allConfis;
}

function get_all_boutique()
{

    $allBoutique = requete("SELECT * FROM boutiques");
    return $allBoutique;
}


function get_boutique_by_id($id)
{
    $boutique = requete("SELECT * FROM boutiques WHERE utilisateur_id = $id");
    return $boutique;
}

function get_stock_boutique($id)
{
    $stock = requete("SELECT * FROM stocks where boutique_id = $id");
    return $stock;
}

function get_confis_by_id($id)
{
    $details = requete("SELECT * FROM confiseries where id = $id");
    return $details;
}

function add_product($boutique_id, $confiserie_id, $quantite)
{
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

function remove_product($boutique_id, $confiserie_id, $quantite)
{
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

function add_user($username, $password, $email, $role, $name, $prenom, $ddn)
{
    global $PDO;
    $checkStmt = $PDO->prepare("SELECT COUNT(*) FROM utilisateurs WHERE username = :username");
    $checkStmt->bindParam(':username', $username);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        return "Erreur : Le nom d'utilisateur existe déjà.";
    } else {
        $checkStmt = $PDO->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();
        if ($count > 0) {
            return "Erreur : L'adresse mail est déjà utilisée.";
        } else {
            try {
                $stmt = $PDO->prepare("INSERT INTO utilisateurs (username, password, email, role, nom, prenom, ddn) VALUES (:username, :password, :email, :role, :nom, :prenom, :ddn)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':nom', $name);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':ddn', $ddn);

                $stmt->execute();

                return "L'utilisateur a été ajouté avec succès.";

            } catch (PDOException $e) {
                return "Erreur lors de l'ajout de l'utilisateur";
            }
        }
    }
}


function delete_boutique($id)
{
    try {
        requete("DELETE FROM boutiques WHERE id = $id");
        return "Boutique supprimée avec succès";
    } catch (PDOException $e) {
        return "Erreur lors de la suppression de la boutique";
    }

}

function select_all_gerant()
{
    $all_gerant = requete("SELECT * FROM utilisateurs where role like 'gerant' ");
    return $all_gerant;
}

function add_boutique($nom, $utilisateur_id, $numero_rue, $nom_adresse, $code_postal, $ville, $pays){

    global $PDO;
    $checkStmt = $PDO->prepare("SELECT COUNT(*) FROM boutiques WHERE nom = :nom");
    $checkStmt->bindParam(':nom', $nom);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        return "Erreur : La boutique existe déjà.";
    }
    try {
        $stmt = $PDO->prepare("INSERT INTO boutiques (nom, utilisateur_id, numero_rue, nom_adresse, code_postal, ville, pays) VALUES (:nom, :utilisateur_id, :numero_rue, :nom_adresse, :code_postal, :ville, :pays)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->bindParam(':numero_rue', $numero_rue);
        $stmt->bindParam(':nom_adresse', $nom_adresse);
        $stmt->bindParam(':code_postal', $code_postal);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':pays', $pays);

        $stmt->execute();

        return "La boutique a été ajouté avec succès.";
    } catch (PDOException $e) {
        return "Erreur lors de l'ajout de la boutique";
    }
}


function remove_product_from_all($produit_id){
    try{
    requete("DELETE FROM confiseries where id LIKE $produit_id");
    return "Bonbon supprimé avec succès";
}catch(PDOException $e) {
    return "Erreur lors de la suppression du bonbon";
}
}

function add_bonbon($nom, $type, $prix, $description){

    global $PDO;
    $checkStmt = $PDO->prepare("SELECT COUNT(*) FROM confiseries WHERE nom = :nom");
    $checkStmt->bindParam(':nom', $nom);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        return "Erreur : Le bonbon existe déjà.";
    }
    try {
        $stmt = $PDO->prepare("INSERT INTO confiseries (nom, type, prix, description) VALUES (:nom, :type, :prix, :description)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':description', $description);


        $stmt->execute();

        return "Le bonb a été ajouté avec succès.";
    } catch (PDOException $e) {
        return "Erreur lors de l'ajout du bonbon";
    }
}










?>