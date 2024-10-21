<?php
$jsonFilePath = __DIR__ . '/../../data/StarluxeProducts.json';

function getAllProducts() {
    global $jsonFilePath;
    $jsonData = file_get_contents($jsonFilePath);
    return json_decode($jsonData, true)['products_services'];
}

function getProductByIndex($index) {
    $products = getAllProducts();
    return $products[$index] ?? null;
}

function createProduct($name, $description, $applications) {
    global $jsonFilePath;
    $products = getAllProducts();
    $newProduct = [
        'name' => $name,
        'description' => $description,
        'applications' => $applications
    ];
    $products[] = $newProduct;
    saveProducts($products);
}

function updateProduct($index, $name, $description, $applications) {
    $products = getAllProducts();
    $products[$index] = [
        'name' => $name,
        'description' => $description,
        'applications' => $applications
    ];
    saveProducts($products);
}

function deleteProduct($index) {
    $products = getAllProducts();
    unset($products[$index]); 
    saveProducts(array_values($products));
}

function saveProducts($products) {
    global $jsonFilePath;
    $jsonData = ['products_services' => $products];
    file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));
}
?>
