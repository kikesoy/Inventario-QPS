<?php
require_once("../db/QPSelectApps.php");
require_once("../models/ProductModel.php");

$prodReference = strtoupper(trim($_POST["prod-reference"]));
$prodName= strtoupper(trim($_POST["prod-name"]));
$team = $_POST["team"];
$count = $_POST["count"];
$prodLocation = strtoupper(trim($_POST["prod-location"]));
$prodLocationSize = $_POST["prod-location-size"];
$prodLocationOthers = $_POST["prod-location-others"];
$prodQuantity = trim($_POST["prod-quantity"]);
$brandHarfon = isset($_POST["brand-harfon"]) ? $_POST["brand-harfon"] : 0;
$brandWps = isset($_POST["brand-wps"]) ? $_POST["brand-wps"] : 0;
$brandTras = isset($_POST["brand-tras"]) ? $_POST["brand-tras"] : 0;
$brandZen = isset($_POST["brand-zen"]) ? $_POST["brand-zen"] : 0;
$brandBlank = isset($_POST["brand-blank"]) ? $_POST["brand-blank"] : 0;
$brandOther = isset($_POST["brand-other"]) ? $_POST["brand-other"] : 0;
$packageType = $_POST["package-type"];
$condPkg = $_POST["cond-pkg"];
$condProd = $_POST["cond-prod"];
$pkgTypeGroup1 = isset($_POST["package-type-group1"]) ? $_POST["package-type-group1"] : null;
$pkgQtyGroup1 = trim($_POST["package-quantity-group1"]) !== "" ? $_POST["package-quantity-group1"] : null;
$prodQtyGroup1 = trim($_POST["prod-quantity-group1"]) !== "" ? $_POST["prod-quantity-group1"] : null;
$pkgTypeGroup2 = isset($_POST["package-type-group2"]) ? $_POST["package-type-group2"] : null;
$pkgQtyGroup2 = trim($_POST["package-quantity-group2"]) !== "" ? $_POST["package-quantity-group2"] : null;
$prodQtyGroup2 = trim($_POST["prod-quantity-group2"]) !== "" ? $_POST["prod-quantity-group2"] : null;
$pkgTypeGroup3 = isset($_POST["package-type-group3"]) ? $_POST["package-type-group3"] : null;
$pkgQtyGroup3 = trim($_POST["package-quantity-group3"]) !== "" ? $_POST["package-quantity-group3"] : null;
$prodQtyGroup3 = trim($_POST["prod-quantity-group3"]) !== "" ? $_POST["prod-quantity-group3"] : null;
$pkgTypeGroup4 = isset($_POST["package-type-group4"]) ? $_POST["package-type-group4"] : null;
$pkgQtyGroup4 = trim($_POST["package-quantity-group4"]) !== "" ? $_POST["package-quantity-group4"] : null;
$prodQtyGroup4 = trim($_POST["prod-quantity-group4"]) !== "" ? $_POST["prod-quantity-group4"] : null;
$askRevision = isset($_POST["ask-revision"]) ? $_POST["ask-revision"] : "No";
$notFound = isset($_POST["not-found"]) ? $_POST["not-found"] : 0;
$quarantine = isset($_POST["quarantine"]) ? $_POST["quarantine"] : "No";
$comments = $_POST["comments"];
$audit = isset($_POST["audit"]) ? $_POST["audit"] : 0;
$httpUserAgent = $_SERVER['HTTP_USER_AGENT'];
$remoteAddr = $_SERVER['REMOTE_ADDR'];

$product = new ProductModel();
$product->storeProduct($prodReference, $prodName, $team, $count, $prodLocation, $prodLocationSize, $prodLocationOthers, $prodQuantity, $brandHarfon, $brandWps, $brandTras, $brandZen, $brandBlank, $brandOther, $packageType, $condPkg, $condProd, $pkgTypeGroup1, $pkgQtyGroup1, $prodQtyGroup1, $pkgTypeGroup2, $pkgQtyGroup2, $prodQtyGroup2, $pkgTypeGroup3, $pkgQtyGroup3, $prodQtyGroup3, $pkgTypeGroup4, $pkgQtyGroup4, $prodQtyGroup4, $askRevision, $notFound, $quarantine, $comments, $audit, $httpUserAgent, $remoteAddr);

echo true;
