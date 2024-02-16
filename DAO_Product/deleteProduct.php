<?php

require_once('utils/DBconnect.php');
require_once('dao/IProductDAO.php');
require_once('dao/imp/IProductDaoImp.php');


if (isset($_GET['id'])) {
    
    $produit = new IProductDaoImp();
    $produit->deleteProduct($_GET['id']);
    
    header('Location: catalogueProduct.php');
}
