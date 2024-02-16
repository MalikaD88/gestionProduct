<?php
// Inclusion du fichier contenant la classe DBconnect pour la connexion à la base de données
require_once('utils/DBconnect.php');
require_once('dao/IProductDAO.php');
require_once('dao/imp/IPersonDaoImp.php');

try {
    // Tentative d'obtention de l'instance de connexion à la base de données via le singleton DBconnect
    $connexion = DBconnect::getInstance(
        "mysql:host=localhost;dbname=listeproduct",
        "root",
        ""
    );

    // Définition de la requête SQL pour insérer une nouvelle personne dans la table 'persons'
    $query = "INSERT INTO produits (numProduct , name , price, description) VALUES ('A167924', 'cadre' , '25.99', 'retrouvez de la nature au sein de votre intérieur avec ce cadre végétal 50*50cm'); ";

    // Préparation de la requête SQL
    $stmt = $connexion->getConnexion()->prepare($query);

    // Exécution de la requête SQL préparée
    if ($stmt->execute()) {
        // Affichage d'un message si l'insertion s'est déroulée avec succès
        echo "Le cadre est là! ";
    }
} catch (PDOException $e) {
    // Gestion des exceptions PDO : affichage du message d'erreur en cas d'échec
    echo $e->getMessage();
}