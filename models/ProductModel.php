<?php

class ProductModel
{
    private $db;

    private $products;

    public function __construct()
    {
        $this->db = QPSelectApps::connection();
        $this->products = [];
    }

    public function indexProducts()
    {
        $sql = "CALL sp_get_product_list()";
        $query = $this->db->prepare($sql);
        $query->execute();
        while ($rows = $query->fetch(PDO::FETCH_ASSOC)) {
            $this->products[] = $rows;
        }

        return $this->products;
    }

    public function getProducts($code)
    {
        $sql = "CALL sp_get_products(:code)";
        $query = $this->db->prepare($sql);
        $query->execute([":code" => $code]);
        while ($rows = $query->fetch(PDO::FETCH_ASSOC)) {
            $this->products[] = $rows;
        }

        return $this->products;
    }

    public function storeProduct($prodReference, $prodName, $team, $count, $prodLocation, $prodLocationSize, $prodLocationOthers, $prodQuantity, $brandHarfon, $brandWps, $brandTras, $brandZen, $brandBlank, $brandOther, $packageType, $condPkg, $condProd, $pkgTypeGroup1, $pkgQtyGroup1, $prodQtyGroup1, $pkgTypeGroup2, $pkgQtyGroup2, $prodQtyGroup2, $pkgTypeGroup3, $pkgQtyGroup3, $prodQtyGroup3, $pkgTypeGroup4, $pkgQtyGroup4, $prodQtyGroup4, $askRevision, $notFound, $quarantine, $comments, $audit, $httpUserAgent, $remoteAddr)
    {
        $sql = "CALL sp_store_products(:code, :name, :team, :count, :location, :location_size, :location_others, :quantity, :brand_harfon, :brand_wps, :brand_tras, :brand_zen, :brand_blank, :brand_other, :package_type, :pack_condition, :product_condition, :package_type_group1, :package_quantity_group1, :prod_quantity_group1, :package_type_group2, :package_quantity_group2, :prod_quantity_group2, :package_type_group3, :package_quantity_group3, :prod_quantity_group3, :package_type_group4, :package_quantity_group4, :prod_quantity_group4, :ask_inspection, :not_found, :quarantine, :comments, :audit, :http_user_agent, :remote_addr)";
        $query = $this->db->prepare($sql);
        $query->execute([":code" => $prodReference, ":name" => $prodName, ":team" => $team, ":count" => $count, ":location" => $prodLocation, ":location_size" => $prodLocationSize, ":location_others" => $prodLocationOthers, ":quantity" => $prodQuantity, ":brand_harfon" => $brandHarfon, ":brand_wps" => $brandWps, ":brand_tras" => $brandTras, ":brand_zen" => $brandZen, ":brand_blank" => $brandBlank, ":brand_other" => $brandOther, ":package_type" => $packageType, ":pack_condition" => $condPkg, ":product_condition" => $condProd, ":package_type_group1" => $pkgTypeGroup1, ":package_quantity_group1" => $pkgQtyGroup1, ":prod_quantity_group1" => $prodQtyGroup1, ":package_type_group2" => $pkgTypeGroup2, ":package_quantity_group2" => $pkgQtyGroup2, ":prod_quantity_group2" => $prodQtyGroup2, ":package_type_group3" => $pkgTypeGroup3, ":package_quantity_group3" => $pkgQtyGroup3, ":prod_quantity_group3" => $prodQtyGroup3, ":package_type_group4" => $pkgTypeGroup4, ":package_quantity_group4" => $pkgQtyGroup4, ":prod_quantity_group4" => $prodQtyGroup4, ":ask_inspection" => $askRevision, ":not_found" => $notFound, ":quarantine" => $quarantine, ":comments" => $comments, ":audit" => $audit, ":http_user_agent" => $httpUserAgent, ":remote_addr" => $remoteAddr]);
    }
}