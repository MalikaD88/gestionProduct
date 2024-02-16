<?php

interface IProductDAO{

    public function saveProduct($name, $numProduct, $price, $description): bool;

    public function getAllProducts(): array;

    public function updateProduct($id, $name, $numProduct, $price, $description): bool;

    public function deleteProduct($id): bool;
    public function getProductById($id): array;

    public function getProductByName($name): array;
    public function getProductByPriceIN($minPrice, $maxPrice): array;


}