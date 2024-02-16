<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de création de produit</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <img src="bannière_florale.jpg" id= fleurs alt="un sakura fleuri" width=100% height=150px />
</header>

<h1>  Déco by Home </h1>
    
<div id= "Formulaire">

<fieldset>

<legend> Création d'un produit </legend>


    <form action="" method="post">
        
        <label for="name">Nom : </label><br>
        <input type="text" name="name"> <br>

        <label for="numProduct">Numéro du produit :</label><br>
        <input type="text" name="numProduct"> <br>

        <label for="price">Prix :</label><br>
        <input type="number" name="price"> <br>

        <label for="description">Description: </label> <br>
        <input type="text" name="description"> <br>

        <input type="submit" value="Créons!">
    </form>

</div>

</fieldset>

<footer> Pour une déco éco-responsable, suivez-nous!</footer>

    <?php
   
    require_once('utils/DBconnect.php');
    require_once('dao/IProductDAO.php');
    require_once('dao/imp/IProductDaoImp.php');

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

       
        if (
            isset($_POST['name'])
            && isset($_POST['numProduct'])
            && isset($_POST['price'])
            && isset($_POST['description'])
        ) {
            
            $name = $_POST['name'];
            $numProduct = $_POST['numProduct'];
            $prix = $_POST['price'];
            $description = $_POST['description'];

            $produit = new IProductDaoImp();
            $produit->saveProduct($name, $numProduct, $price, $description);
        }
    }
    ?>
</body>

</html>