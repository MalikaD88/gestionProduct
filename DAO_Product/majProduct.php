<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour du produit</title>
    <link rel="stylesheet" href="/build.css">
</head>

<body>
    <!-- EN PHP ON Recupere la personne par son id -->
    <?php
    // Inclusion des fichiers nécessaires
    require_once('model/Product.php');
    require_once('dao/IProductDAO.php');
    require_once('dao/imp/IProductDaoImp.php');
    require_once('utils/DBconnect.php');

    // Récupération de l'ID de la personne depuis l'URL
    $product_id = $_GET['id'];

    // Récupération des informations de la personne à partir de son ID
    $productDao = new IProductDaoImp();
    $result = $productDao->getProductById($product_id);
    
    // Création d'un objet Person avec les informations récupérées
    $product = new Product(
        $result['id'],
        $result['name'],
        $result['numProduct'],
        $result['price'],
        $result['description']
    );
    ?>

    <!-- Formulaire de mise à jour des informations de la personne -->
    <div class= "bg-orange-200">
    
    <fieldset>

<legend> Création d'un produit </legend>


    <form action="" method="post">
        
        <label for="name">Nom : </label><br>
        <input type="text" name="name" value="<?= $product->getName() ?>"> <br>

        <label for="numProduct">Numéro du produit :</label><br>
        <input type="text" name="numProduct" value="<?= $product->getNumProduct() ?>"> <br>

        <label for="price">Prix :</label><br>
        <input type="number" name="price" value="<?= $product->getPrice() ?>"> <br>

        <label for="description">Description: </label> <br>
        <input type="text" name="description" value="<?= $product->getDescription() ?>"> <br>

        <input type="submit" value="Créons!">
    </form>


</fieldset>
</div>

    <!-- Le traitement du formulaire en php avec utilisation de la DAO -->
    <?php
    // Vérification si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        // Récupération des nouvelles valeurs depuis le formulaire
        $name = $_POST['name'];
        $numProduct = $_POST['numProduct'];
        $prix = $_POST['price'];
        $description = $_POST['description'];

        // Appel de la méthode updatePerson de la DAO pour mettre à jour les informations de la personne dans la base de données
        $productDao = new IProductDaoImp();
        $productDao->updateProduct( $product_id, $numProduct, $name, $price, $description);
        
        // Redirection vers la page de sélection après la mise à jour
        header("Location: catalogueProduct.php");
    }
    ?>
</body>

</html>
