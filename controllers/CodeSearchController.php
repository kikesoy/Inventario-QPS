<?php
require_once("../db/QPSelectApps.php");
require_once("../models/ProductModel.php");

$code = strtoupper(trim($_POST["code"]));

$product = new ProductModel();
$products = $product->getProducts($code);
if (empty($products[0])) {
    $productData["code"] = $code;
    $productData["name"] = null;
} else {
    $productData["code"] = $products[0]["code"];
    $productData["name"] = $products[0]["name"];
}

print json_encode($productData);