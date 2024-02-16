<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de produits</title>
</head>
<body>
    
<h1> Déco By Home </h1>

<h2> Catalogue de produits </h2>

<?php
require_once('utils/DBconnect.php');
require_once('dao/IProductDAO.php');
require_once('dao/imp/IProductDaoImp.php');
require_once('model/Product.php');

$produitDAO = new IProductDaoImp();
//$produitDAO->saveProduct("A546546","vase", "43", "vase en grès d'inspiration japonaise");
$produits = $produitDAO->getAllProducts();

// print_r($produits);

// $produitDAO->updateProduct(6, "A546546", "vase", "43", "vase en grès d'inspiration japonaise");
// $produitDAO->deleteProduct(1);
// $produits = $produitDAO->getProductById(6);
// $produits = $produitDAO->getProductByName("lampe");
// $produits= $produitDAO->getProductByPriceIN(1, 100);

foreach ($produits as $produit) {
    echo $produit;
    ?>
        <a href="deleteProduct.php?id=<?= $produit->getId() ?> ">
            <button>Supprimer</button>
        </a>
        <a href="majProduct.php?id=<?= $produit->getId() ?>">
            <button>Mettre à jour</button>
        </a>

    <?php
    }
    ?>
</body>
</html>