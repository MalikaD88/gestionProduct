<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php
    
    require_once('model/Product.php');
    require_once('dao/IProductDAO.php');
    require_once('dao/imp/IProductDaoImp.php');
    require_once('utils/DBconnect.php');

    
    $produit_id = $_GET['id'];

    
    $produit = new IProductDaoImp();
    $result = $produitDao->getProduitsById($produit_id);
    
    
    $produit = new Product(
        $result['id'],
        $result['name'],
        $result['numProduct'],
        $result['price'],
        $result['description'],
    );
    ?>

   
    <form action="" method="post">
        <label for="name"> Nom : </label>
        <input type="text" name="name" value="<?= $produit->getName() ?>"> <br>

        <label for="numProduct"> Numéro de produit : </label>
        <input type="text" name="numProduct" value="<?= $produit->getNumProduct() ?>"> <br>

        <label for="price"> prix : </label>
        <input type="price" name="price" value="<?= $produit->getPrice() ?>"> <br>

        <label for="description"> description : </label>
        <input type="description" name="description" value="<?= $produit->getDescription() ?>"> <br>

        <input type="submit" name="submit" value="Mettre à jour">
    </form>

   
    <?php
    
    if (isset($_POST['submit'])) {
       
        $name = $_POST['name'];
        $numProduit = $_POST['numProduit'];
        $prix = $_POST['price'];
        $description = $_POST['description'];

        
        $produit = new IProductDaoImp();
        $produit->updateProduct($produit_id, $name, $numProduct, $price, $description);
        
        
        header("Location: index.php");
    }
    ?>
</body>

</html>
