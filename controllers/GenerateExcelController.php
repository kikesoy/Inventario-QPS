<?php
require_once("../db/QPSelectApps.php");
require_once("../models/ProductModel.php");
require_once("../libs/excel/PHPExcel.php");

$product = new ProductModel();
$products = $product->indexProducts();

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Catiuska Gimenez")->setDescription("Reporte de productos");

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Listado de productos");

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Código');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Equipo');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Conteo');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Ubicación');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tamaño de ubicación');
$objPHPExcel->getActiveSheet()->setCellValue('H1', '¿Otros productos en esta ubicación?');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Cantidad');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Harfon');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'WPS');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Tras');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Zen');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Caja Blanca');
$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Otra');
$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Tipo de empaque');
$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Condición del empaque');
$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Condición del producto');
$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Tipo de paquete grupo #1');
$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Cantidad de paquetes grupo #1');
$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Cantidad de productos grupo #1');
$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Tipo de paquete grupo #2');
$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Cantidad de paquetes grupo #2');
$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Cantidad de productos grupo #2');
$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Tipo de paquete grupo #3');
$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Cantidad de paquetes grupo #3');
$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Cantidad de productos grupo #3');
$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Tipo de paquete grupo #4');
$objPHPExcel->getActiveSheet()->setCellValue('AC1', 'Cantidad de paquetes grupo #4');
$objPHPExcel->getActiveSheet()->setCellValue('AD1', 'Cantidad de productos grupo #4');
$objPHPExcel->getActiveSheet()->setCellValue('AE1', '¿Revisar?');
$objPHPExcel->getActiveSheet()->setCellValue('AF1', 'No encontrado');
$objPHPExcel->getActiveSheet()->setCellValue('AG1', 'Cuarentena');
$objPHPExcel->getActiveSheet()->setCellValue('AH1', 'Comentarios');
$objPHPExcel->getActiveSheet()->setCellValue('AI1', 'Auditar');
$objPHPExcel->getActiveSheet()->setCellValue('AJ1', 'Agente de usuario');
$objPHPExcel->getActiveSheet()->setCellValue('AK1', 'Dirección IP');
$objPHPExcel->getActiveSheet()->setCellValue('AL1', 'Fecha');

for ($i = 2; $i < count($products) + 2; $i++) {
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $products[$i - 2]["id"]);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $products[$i - 2]["code"]);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $products[$i - 2]["name"]);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $products[$i - 2]["team"]);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $products[$i - 2]["count"]);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $products[$i - 2]["location"]);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $products[$i - 2]["location_size"]);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $products[$i - 2]["location_others"]);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $products[$i - 2]["quantity"]);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $products[$i - 2]["brand_harfon"]);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $products[$i - 2]["brand_wps"]);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $products[$i - 2]["brand_tras"]);
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$i, $products[$i - 2]["brand_zen"]);
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$i, $products[$i - 2]["brand_blank"]);
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$i, $products[$i - 2]["brand_other"]);
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$i, $products[$i - 2]["package_type"]);
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, $products[$i - 2]["pack_condition"]);
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$i, $products[$i - 2]["product_condition"]);
    $objPHPExcel->getActiveSheet()->setCellValue('S'.$i, $products[$i - 2]["package_type_group1"]);
    $objPHPExcel->getActiveSheet()->setCellValue('T'.$i, $products[$i - 2]["package_quantity_group1"]);
    $objPHPExcel->getActiveSheet()->setCellValue('U'.$i, $products[$i - 2]["prod_quantity_group1"]);
    $objPHPExcel->getActiveSheet()->setCellValue('V'.$i, $products[$i - 2]["package_type_group2"]);
    $objPHPExcel->getActiveSheet()->setCellValue('W'.$i, $products[$i - 2]["package_quantity_group2"]);
    $objPHPExcel->getActiveSheet()->setCellValue('X'.$i, $products[$i - 2]["prod_quantity_group2"]);
    $objPHPExcel->getActiveSheet()->setCellValue('Y'.$i, $products[$i - 2]["package_type_group3"]);
    $objPHPExcel->getActiveSheet()->setCellValue('Z'.$i, $products[$i - 2]["package_quantity_group3"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AA'.$i, $products[$i - 2]["prod_quantity_group3"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AB'.$i, $products[$i - 2]["package_type_group4"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AC'.$i, $products[$i - 2]["package_quantity_group4"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AD'.$i, $products[$i - 2]["prod_quantity_group4"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AE'.$i, $products[$i - 2]["ask_inspection"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, $products[$i - 2]["not_found"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, $products[$i - 2]["quarantine"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AH'.$i, $products[$i - 2]["comments"]);
    $objPHPExcel->getActiveSheet()->getStyle('AH'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->setCellValue('AI'.$i, $products[$i - 2]["audit"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$i, $products[$i - 2]["http_user_agent"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AK'.$i, $products[$i - 2]["remote_addr"]);
    $objPHPExcel->getActiveSheet()->setCellValue('AL'.$i, $products[$i - 2]["created_at"]);
}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Reporte-Productos.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('php://output');