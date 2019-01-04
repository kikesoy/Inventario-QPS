<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte | Inventario QPS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
</head>
<body>
<?php
require_once("../controllers/IndexProductController.php");
?>
<div class="container">
    <div class="row">
        <header class="col d-flex justify-content-between align-items-center">
            <h1>Reporte Inventario QPS</h1>
            <div class="admin">
                <a href="../controllers/GenerateExcelController.php" class="btn btn-primary">Descargar Excel</a>
            </div>
        </header>
    </div>
</div>

<div class="table-responsive">
    <table id="table-inv" class="table table-striped tablesorter">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Equipo</th>
            <th scope="col">Conteo</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Tamaño de ubicación</th>
            <th scope="col">¿Otros productos en esta ubicación?</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Harfon</th>
            <th scope="col">WPS</th>
            <th scope="col">Tras</th>
            <th scope="col">Zen</th>
            <th scope="col">Caja Blanca</th>
            <th scope="col">Otra</th>
            <th scope="col">Tipo de empaque</th>
            <th scope="col">Condición del empaque</th>
            <th scope="col">Condición del producto</th>
            <th scope="col">Tipo de paquete grupo #1</th>
            <th scope="col">Cantidad de paquetes grupo #1</th>
            <th scope="col">Cantidad de productos grupo #1</th>
            <th scope="col">Tipo de paquete grupo #2</th>
            <th scope="col">Cantidad de paquetes grupo #2</th>
            <th scope="col">Cantidad de productos grupo #2</th>
            <th scope="col">Tipo de paquete grupo #3</th>
            <th scope="col">Cantidad de paquetes grupo #3</th>
            <th scope="col">Cantidad de productos grupo #3</th>
            <th scope="col">Tipo de paquete grupo #4</th>
            <th scope="col">Cantidad de paquetes grupo #4</th>
            <th scope="col">Cantidad de productos grupo #4</th>
            <th scope="col">¿Revisar?</th>
            <th scope="col">No encontrado</th>
            <th scope="col">Cuarentena</th>
            <th scope="col">Comentarios</th>
            <th scope="col">Auditar</th>
            <th scope="col">Agente de usuario</th>
            <th scope="col">Dirección IP</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ubicación Equivocada</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($products as $product):?>
            <tr>
                <th scope="row"><?php echo $product["id"]; ?></th>
                <td><?php echo $product["code"]; ?></td>
                <td><?php echo $product["name"]; ?></td>
                <td><?php echo $product["team"]; ?></td>
                <td><?php echo $product["count"]; ?></td>
                <td><?php echo $product["location"]; ?></td>
                <td><?php echo $product["location_size"]; ?></td>
                <td><?php echo $product["location_others"]; ?></td>
                <td><?php echo $product["quantity"]; ?></td>
                <td><?php echo $product["brand_harfon"]; ?></td>
                <td><?php echo $product["brand_wps"]; ?></td>
                <td><?php echo $product["brand_tras"]; ?></td>
                <td><?php echo $product["brand_zen"]; ?></td>
                <td><?php echo $product["brand_blank"]; ?></td>
                <td><?php echo $product["brand_other"]; ?></td>
                <td><?php echo $product["package_type"]; ?></td>
                <td><?php echo $product["pack_condition"]; ?></td>
                <td><?php echo $product["product_condition"]; ?></td>
                <td><?php echo $product["package_type_group1"]; ?></td>
                <td><?php echo $product["package_quantity_group1"]; ?></td>
                <td><?php echo $product["prod_quantity_group1"]; ?></td>
                <td><?php echo $product["package_type_group2"]; ?></td>
                <td><?php echo $product["package_quantity_group2"]; ?></td>
                <td><?php echo $product["prod_quantity_group2"]; ?></td>
                <td><?php echo $product["package_type_group3"]; ?></td>
                <td><?php echo $product["package_quantity_group3"]; ?></td>
                <td><?php echo $product["prod_quantity_group3"]; ?></td>
                <td><?php echo $product["package_type_group4"]; ?></td>
                <td><?php echo $product["package_quantity_group4"]; ?></td>
                <td><?php echo $product["prod_quantity_group4"]; ?></td>
                <td><?php echo $product["ask_inspection"]; ?></td>
                <td><?php echo $product["not_found"]; ?></td>
                <td><?php echo $product["quarantine"]; ?></td>
                <td><?php echo $product["comments"]; ?></td>
                <td><?php echo $product["audit"]; ?></td>
                <td><?php echo $product["http_user_agent"]; ?></td>
                <td><?php echo $product["remote_addr"]; ?></td>
                <td><?php echo $product["created_at"]; ?></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>
</body>
</html>