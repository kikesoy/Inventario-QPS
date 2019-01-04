<?php
require_once("../db/QPSelectApps.php");
require_once("../models/ProductModel.php");

$product = new ProductModel();
$products = $product->indexProducts();