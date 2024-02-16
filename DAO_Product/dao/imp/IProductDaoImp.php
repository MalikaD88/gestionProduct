<?php

class IProductDaoImp implements IProductDao{
    private PDO $connexion;

    public function __construct(){
        $this->connexion = DBconnect::getInstance(
            "mysql:host=localhost;dbname=listeproduct",
            "root",
            ""
        )->getConnexion();
    }

    public function getAllProducts(): array
    {
 
            $statement = $this->connexion->prepare("SELECT * FROM produits ;");
            
            $statement->execute();
            $produits =[];
            
            $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultat as $row) {
                   
                    $produits[] = new Product(
                        $row['id'],
                        $row['numProduct'],
                        $row['name'],
                        $row['price'],
                        $row['description']
                    );
                }
            

        return $produits;
    }

    public function saveProduct($name, $numProduct, $price, $description): bool{
        try {

            $query = "INSERT INTO produits (name, numProduct, price, description) VALUES (:name, :numProduct, :price, :description)";

           
            $stmt = $this->connexion->prepare($query);

           
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':numProduct', $numProduct);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':description', $description);

            
            $stmt->execute();

            echo "Le produit a été ajouté avec succès!";

            return true;

        } catch (PDOException $e) {

           echo $e->getMessage();

        }
        return false;
    }

    public function updateProduct($id, $name, $numProduct, $price, $description): bool {
        try {
           
            
            $query  = "UPDATE produits SET name = :name , numProduct = :numProduct , price = :price , description = :descrption WHERE id = :id ;";

           
            $stmt = $this->connexion->prepare($query);

            
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':numProduct', $numProduct);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':description', $description);

            
            $stmt->execute();
            return true;
        } catch (PDOException $PDOException) {
            
            echo $PDOException->getMessage();
        }
        return false;
    }



    public function deleteProduct($id): bool{
        try {


            $query = "DELETE FROM produits WHERE id = :id";

            $stmt = $this->connexion->prepare($query);

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function getProductById($id): array {
        $result = []; 

        try {
           
            $query = "SELECT * FROM produits WHERE id = :id";
            
            $stmt = $this->connexion->prepare($query);

            $stmt->bindValue(':id', $id);

            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // foreach ($result as $row) {
                   
            //     $produits[] = new Product(
            //         $row['id'],
            //         $row['numProduct'],
            //         $row['name'],
            //         $row['price'],
            //         $row['description']
            //     );
            // }


        } catch (PDOException $e) {
            
            echo $e->getMessage();
        }

        return $result;
    }

    public function getProductByName($name): array{
        $result = [];
try{
    $query = "SELECT * FROM produits WHERE name LIKE :name";
            
    $stmt = $this->connexion->prepare($query);

    $stmt->bindValue(':name', '%' . $name . '%');

    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
                   
        $produits[] = new Product(
            $row['id'],
            $row['numProduct'],
            $row['name'],
            $row['price'],
            $row['description']
        );
    }

} catch (PDOException $e) {
    
    echo $e->getMessage();
}

return $result;

}
    
    public function getProductByPriceIN($minPrice, $maxPrice): array{
        $result = [];
        try{
            $query = "SELECT * FROM produits WHERE price BETWEEN :minPrice 
            AND :maxPrice ";
                    
            $stmt = $this->connexion->prepare($query);
        
            $stmt->bindValue(':minPrice', $minPrice);
            $stmt->bindValue(':maxPrice', $maxPrice);
        
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                   
                $produits[] = new Product(
                    $row['id'],
                    $row['numProduct'],
                    $row['name'],
                    $row['price'],
                    $row['description']
                );
            }

        } catch (PDOException $e) {
            
            echo $e->getMessage();
        }
        
        return $result;    
    }

}