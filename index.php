<?php 
$appVersion = rand(1, 1000000);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario QPS</title>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css?v=<?php echo $appVersion ?>">
</head>
<body>
<!-- MENSAJES DE ERROR -->
<div id="alert-message" class="alert">
    <h2 class="alert-title"></h2>
    <p class="alert-text"></p>
    <div class="btn-close">
        <i class="fas fa-times"></i>
    </div>
</div>

<div id="app" class="app-container">
    <!-- BUSCADOR DE CODIGO -->
    <header id="search-bar">
        <form name="code-search" id="code-search" class="form">
            <input type="text" id="code" name="code" placeholder="Código del producto" class="form-item form-item-search">
            <button type="submit" name="btn-submit" id="btn-submit" value="Submit" class="btn btn-header no-radius-left">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </header>

    <!-- FORMULARIO DE INVENTARIO -->
    <form name="store-product-list" id="store-product-list">
        <section id="product-preview">
            <div class="row align-items-center">
                <div id="head-prod-image" class="col-no-grow">
                    <img src="./img/default.png" alt="">
                </div><!-- .col -->
                <div class="col">
                    <h1 id="head-prod-reference">Cod.</h1>
                    <h6 id="head-prod-name">Descripción</h6>
                </div><!-- .col -->
            </div><!-- .row -->
        </section>
        <section id="product-inventory">
            <div class="row">
                <div class="col-100 form-block bg-yellow">
                    <label for="team">Equipo: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="team" id="team-1" value="1" >
                        <label for="team-1">1</label>
                        
                        <input type="radio" name="team" id="team-2" value="2" >
                        <label for="team-2">2</label>

                        <input type="radio" name="team" id="team-3" value="3" >
                        <label for="team-3">3</label>

                        <input type="radio" name="team" id="team-4" value="4" >
                        <label for="team-4">4</label>

                        <input type="radio" name="team" id="team-5" value="5" >
                        <label for="team-5">5</label>

                        <input type="radio" name="team" id="team-6" value="6" >
                        <label for="team-6">6</label>

                        <input type="radio" name="team" id="team-7" value="7" >
                        <label for="team-7">7</label>

                        <input type="radio" name="team" id="team-c" value="Catiuska" >
                        <label for="team-c">C</label>

                        <input type="radio" name="team" id="team-r" value="Ricardo" >
                        <label for="team-r">R</label>

                        <input type="radio" name="team" id="team-h" value="Honorio" >
                        <label for="team-h">H</label>
                    </div>
                </div>

                <div class="col-100 form-block bg-yellow">
                    <label for="team">Conteo: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="count" id="count-1" value="1" >
                        <label for="count-1">1ero</label>
                        
                        <input type="radio" name="count" id="count-2" value="2" >
                        <label for="count-2">2do</label>

                        <input type="radio" name="count" id="count-3" value="3" >
                        <label for="count-3">3ero</label>

                        <input type="radio" name="count" id="count-4" value="4" >
                        <label for="count-4">4to</label>

                        <input type="radio" name="count" id="count-5" value="5" >
                        <label for="count-5">5to</label>

                        <input type="radio" name="count" id="count-6" value="6" >
                        <label for="count-6">6to</label>

                        <input type="radio" name="count" id="count-7" value="7" >
                        <label for="count-7">7mo</label>

                        <input type="radio" name="count" id="count-8" value="8" >
                        <label for="count-8">8vo</label>

                        <input type="radio" name="count" id="count-9" value="9" >
                        <label for="count-9">9no</label>

                        <input type="radio" name="count" id="count-8" value="Cierre" >
                        <label for="count-8">Cierre</label>
                    </div>
                </div>

                <div class="col-100 form-block hide">
                    <input type="checkbox" name="not-found" id="not-found" value="1" hidden>
                </div><!-- .col -->

                <div class="col-100 form-block bg-orange hide" id="col-prod-reference">
                    <label for="prod-reference">Código de referencia: <i class="fas fa-star"></i></label>
                    <input type="text" id="prod-reference" name="prod-reference" value="" class="form-item" required>
                </div><!-- .col -->

                <div class="col-100 form-block bg-orange hide" id="col-prod-name">
                    <label for="prod-name">Nombre: <i class="fas fa-star"></i></label>
                    <input type="text" id="prod-name" name="prod-name" value="" class="form-item" required>
                </div><!-- .col -->

                <div class="col-100 form-block bg-red">
                    <label for="prod-location">Ubicación: <i class="fas fa-star"></i></label>
                    <div class="form-validate">
                        <input type="text" id="prod-location" name="prod-location" class="form-item" placeholder="Código de ubicación" required>
                    </div>
                    <div class="form-validate">
                        <input type="text" id="prod-location-retype" name="prod-location-retype" class="form-item" placeholder="Repetir código de ubicación">
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-red">
                    <label>Tamaño de ubicación: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="prod-location-size" id="prod-location-size-pasillo" value="Pasillo" required>
                        <label for="prod-location-size-pasillo">Pasillo</label>
                        
                        <input type="radio" name="prod-location-size" id="prod-location-size-pallet" value="Pallet" required>
                        <label for="prod-location-size-pallet">Pallet</label>
                        
                        <input type="radio" name="prod-location-size" id="prod-location-size-medio-pallet" value="Medio Pallet" required>
                        <label for="prod-location-size-medio-pallet">Medio Pallet</label>

                        <input type="radio" name="prod-location-size" id="prod-location-size-caja" value="Caja" required>
                        <label for="prod-location-size-caja">Caja</label>
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-red">
                    <label>¿Hay otros productos en esta ubicación? <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="prod-location-others" id="prod-location-others-yes" value="Si" required>
                        <label for="prod-location-others-yes">Si</label>
                        
                        <input type="radio" name="prod-location-others" id="prod-location-others-no" value="No" required>
                        <label for="prod-location-others-no">No</label>
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-red">
                    <label for="prod-location-wrong">Código de ubicación equivocada</label>
                    <div class="form-validate">
                        <input type="text" id="prod-location-wrong" name="prod-location-wrong" class="form-item" placeholder="Código de ubicación equivocado">
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-violet">
                    <label>Marca: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="checkbox" name="brand-harfon" id="brand-harfon" value="1">
                        <label for="brand-harfon">HARF</label>

                        <input type="checkbox" name="brand-wps" id="brand-wps" value="1">
                        <label for="brand-wps">WPS</label>

                        <input type="checkbox" name="brand-tras" id="brand-tras" value="1">
                        <label for="brand-tras">TRAS</label>

                        <input type="checkbox" name="brand-zen" id="brand-zen" value="1">
                        <label for="brand-zen">ZEN</label>

                        <input type="checkbox" name="brand-blank" id="brand-blank" value="1">
                        <label for="brand-blank">BLAN</label>

                        <input type="checkbox" name="brand-other" id="brand-other" value="1">
                        <label for="brand-other">OTRO</label>
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-blue">
                    <label>Tipo de empaque: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="package-type" id="package-type-bolsa" value="Bolsa" required>
                        <label for="package-type-bolsa">Bolsa</label>
                        
                        <input type="radio" name="package-type" id="package-type-caja" value="Caja" required>
                        <label for="package-type-caja">Caja</label>
                        
                        <input type="radio" name="package-type" id="package-type-sin-empaque" value="Sin empaque" required>
                        <label for="package-type-sin-empaque">Sin Empaque</label>

                        <input type="radio" name="package-type" id="package-type-otro" value="Otro" required>
                        <label for="package-type-otro">Otro</label>
                    </div>
                </div>

                <div class="col-100 form-block bg-blue">
                    <label>Condición de los empaques: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="cond-pkg" id="cond-pkg-good" value="Buena" required>
                        <label for="cond-pkg-good">Buena</label>

                        <input type="radio" name="cond-pkg" id="cond-pkg-bad" value="Mala" required>
                        <label for="cond-pkg-bad">Mala</label>
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-blue">
                    <label>Condición de los productos: <i class="fas fa-star"></i></label>
                    <div class="switch-controls">
                        <input type="radio" name="cond-prod" id="cond-prod-good" value="Buena" required>
                        <label for="cond-prod-good">Buena</label>

                        <input type="radio" name="cond-prod" id="cond-prod-bad" value="Mala" required>
                        <label for="cond-prod-bad">Mala</label>
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-blue">
                    <label>Conteo de Multiples Empaques: </label>
                    <table id="multi-packages" class="table-matrix">
                        <thead>
                            <tr>
                                <th class="tinycell">Tipo</th>
                                <th class="tinycell">Unidades x Empaque</th>
                                <th class="tinycell">Empaques Contados</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="group1">
                                <td>
                                <div class="switch-controls">
                                    <input type="radio" name="package-type-group1" id="package-type-group1-bolsa" value="Bolsa">
                                    <label for="package-type-group1-bolsa">Bolsa</label>
                                    
                                    <input type="radio" name="package-type-group1" id="package-type-group1-caja" value="Caja">
                                    <label for="package-type-group1-caja">Caja</label>

                                    <input type="radio" name="package-type-group1" id="package-type-group1-otro" value="Otro">
                                    <label for="package-type-group1-otro">Otro</label>
                                </div>
                                </td>
                                <td>
                                    <input type="number" min="1" id="prod-quantity-group1" name="prod-quantity-group1" class="form-item" disabled>
                                </td>
                                <td>
                                    <input type="number" min="1" id="package-quantity-group1" name="package-quantity-group1" class="form-item" disabled>
                                </td>
                            </tr>
                            <tr id="group2">
                                <td>
                                <div class="switch-controls">
                                    <input type="radio" name="package-type-group2" id="package-type-group2-bolsa" value="Bolsa">
                                    <label for="package-type-group2-bolsa">Bolsa</label>
                                    
                                    <input type="radio" name="package-type-group2" id="package-type-group2-caja" value="Caja">
                                    <label for="package-type-group2-caja">Caja</label>

                                    <input type="radio" name="package-type-group2" id="package-type-group2-otro" value="Otro">
                                    <label for="package-type-group2-otro">Otro</label>
                                </div>
                                </td>
                                <td>
                                    <input type="number" min="1" id="prod-quantity-group2" name="prod-quantity-group2" class="form-item" disabled>
                                </td>
                                <td>
                                    <input type="number" min="1" id="package-quantity-group2" name="package-quantity-group2" class="form-item" disabled>
                                </td>
                            </tr>
                            <tr id="group3">
                                <td>
                                <div class="switch-controls">
                                    <input type="radio" name="package-type-group3" id="package-type-group3-bolsa" value="Bolsa">
                                    <label for="package-type-group3-bolsa">Bolsa</label>
                                    
                                    <input type="radio" name="package-type-group3" id="package-type-group3-caja" value="Caja">
                                    <label for="package-type-group3-caja">Caja</label>

                                    <input type="radio" name="package-type-group3" id="package-type-group3-otro" value="Otro">
                                    <label for="package-type-group3-otro">Otro</label>
                                </div>
                                </td>
                                <td>
                                    <input type="number" min="1" id="prod-quantity-group3" name="prod-quantity-group3" class="form-item" disabled>
                                </td>
                                <td>
                                    <input type="number" min="1" id="package-quantity-group3" name="package-quantity-group3" class="form-item" disabled>
                                </td>
                            </tr>
                            <tr id="group4">
                                <td>
                                    <div class="switch-controls">
                                        <input type="radio" name="package-type-group4" id="package-type-group4-bolsa" value="Bolsa">
                                        <label for="package-type-group4-bolsa">Bolsa</label>

                                        <input type="radio" name="package-type-group4" id="package-type-group4-caja" value="Caja">
                                        <label for="package-type-group4-caja">Caja</label>

                                        <input type="radio" name="package-type-group4" id="package-type-group4-otro" value="Otro">
                                        <label for="package-type-group4-otro">Otro</label>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" min="1" id="prod-quantity-group4" name="prod-quantity-group4" class="form-item" disabled>
                                </td>
                                <td>
                                    <input type="number" min="1" id="package-quantity-group4" name="package-quantity-group4" class="form-item" disabled>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Cantidad de unidades: </th>
                                <th id="count-result">0</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- .col -->

                <div class="col-100 form-block bg-orange">
                    <label for="prod-quantity">Cantidad: <i class="fas fa-star"></i></label>
                    <input type="number" min="1" id="prod-quantity" name="prod-quantity" class="form-item" required>
                </div><!-- .col -->

                <div class="col-100 form-block bg-green-light">
                    <label>Solicitar nueva revisión</label>
                    <div class="switch-controls">
                        <input type="radio" name="ask-revision" id="ask-revision-yes" value="Si">
                        <label for="ask-revision-yes">Si</label>

                        <input type="radio" name="ask-revision" id="ask-revision-no" value="No" required>
                        <label for="ask-revision-no">No</label>
                    </div>
                </div><!-- .col -->

                <div class="col-100 form-block bg-green-light">
                    <label>Enviar a cuarentena:</label>
                    <div class="switch-controls">
                        <input type="radio" name="quarantine" id="quarantine-yes" value="Si">
                        <label for="quarantine-yes">Si</label>

                        <input type="radio" name="quarantine" id="quarantine-no" value="No">
                        <label for="quarantine-no">No</label>
                    </div>
                </div><!-- .col -->
                
                <div class="col-100 form-block bg-green-light">
                    <div class="switch-controls">
                        <input type="checkbox" name="audit" id="audit" value="1">
                        <label for="audit" class="single-button label-red"><i class="fas fa-exclamation-triangle"></i> Este registro reemplaza al anterior</label>
                    </div>
                </div>
                    
                <div class="col-100 form-block bg-gray-80">
                    <label>Comentarios</label>
                    <textarea name="comments" id="comments" class="form-item"></textarea>
                </div>
                
            </div><!-- .row -->
        </section><!-- .container -->
        <footer id="footer-form">
            <button name="btn-confirm" id="btn-confirm" class="btn item-success" disabled>
                Enviar <i class="fas fa-sign-out-alt fa-2x"></i>
            </button>
        </footer>
    </form>
</div>
<!-- CONFIRMAR ENVIO DE FORMULARIO -->
<div id="modal-confirm" class="modal modal-confirm hide">
    <div class="modal-content">
        <header class="modal-header">
            <h2><i class="fas fa-exclamation-triangle"></i> Verificar datos</h2>
        </header>
        <div class="modal-body">
            <header>
                <h1 id="conf-reference"></h1>
                <h5 id="conf-name"> </h5>
                <h5 id="conf-qty"></h5>
            </header>
            <table>
                <tr id="conf-location">
                    <th scope="row">Ubicación:</th>
                    <td></td>
                </tr>
                <tr id="conf-location-size">
                    <th scope="row">Tamaño de ubicación:</th>
                    <td></td>
                </tr>
                <tr id="conf-location-others">
                    <th scope="row">¿Hay otros productos en esta ubicación?</th>
                    <td></td>
                </tr>
                <tr id="conf-location-wrong">
                    <th scope="row">Código de ubicación equivocada</th>
                    <td></td>
                </tr>
                <tr id="conf-brand">
                    <th scope="row">Empaques:</th>
                    <td></td>
                </tr>
                <tr id="conf-type-pkg">
                    <th scope="row">Tipo de empaque:</th>
                    <td></td>
                </tr>
                <tr id="conf-cond-pkg">
                    <th scope="row">Condición de los empaques:</th>
                    <td></td>
                </tr>
                <tr id="conf-cond-prod">
                    <th scope="row">Condición de los productos:</th>
                    <td></td>
                </tr>
                <tr id="conf-ask-revision">
                    <th scope="row">Solicitar nueva revisión:</th>
                    <td></td>
                </tr>
                <tr id="conf-quarantine">
                    <th scope="row">Enviar a cuarentena:</th>
                    <td></td>
                </tr>
                <tr id="conf-team">
                    <th scope="row">Equipo:</th>
                    <td></td>
                </tr>
                <tr id="conf-count">
                    <th scope="row">Conteo:</th>
                    <td></td>
                </tr>
            </table>
            <p id="conf-comments"></p>
            <table id="conf-multi-package" class="hide">
                <tr>
                    <td>Tipo</td>
                    <td>Unidades x Empaque</td>
                    <td>Empaques Contados</td>
                </tr>
                <tr id="conf-group1" class="hide"></tr>
                <tr id="conf-group2" class="hide"></tr>
                <tr id="conf-group3" class="hide"></tr>
                <tr id="conf-group4" class="hide"></tr>
                <tr>
                    <td scoope="row" colspan="2">Cantidad de unidades:</td>
                    <td scoope="row" id="conf-result">0</td>
                </tr>
            </table>
        </div>
        <footer class="modal-footer">
            <div class="button-container">
                <button id="btn-review" class="btn item-error">
                    Revisar <i class="fas fa-undo fa-2x"></i>
                </button>
                <button id="btn-store" class="btn item-success" type="submit" value="Submit">
                    Confirmar <i class="fas fa-check fa-2x"></i>
                </button>
            </div>
        </footer>
    </div>
</div>

<!--PRELOAD IMAGE-->
<div id="preload-image"><img src="img/preloading.gif" alt=""></div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/app.js?v=<?php echo $appVersion ?>"></script>
</body>
</html>