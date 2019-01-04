$(document).ready(function () {
    var alertMessage = $('#alert-message');
    var modalConfirm = $('#modal-confirm');
    var marginTop = $('#search-bar').height()+10;
    var marginBottom = $('#footer-form').height()+10;

    function alertHide() {
        alertMessage.slideUp(500);
    }

    function validateLocation(elem,context) {
        $(elem).val($(elem).val().toUpperCase().trim());
        
        if ($(context).val().toUpperCase().trim() !== "") {
            if ($(elem).val() !== $(context).val().toUpperCase().trim()) {
                $('.form-validate').removeClass('form-validate-success').addClass('form-validate-error');
                $('.validate-icon').remove();
                $('.form-validate').append('<div class="validate-icon validate-icon-error"><i class="far fa-times-circle"></i></div>'); 
                //$('#btn-confirm').prop("disabled", true);
            } else {
                $('.form-validate').removeClass('form-validate-error').addClass('form-validate-success');
                $('.validate-icon').remove();
                $('.form-validate').append('<div class="validate-icon validate-icon-success"><i class="far fa-check-circle"></i></div>');
                //$('#btn-confirm').prop("disabled", false);
            }
        }
    }

    function emptyFields() {
        //Vaciar los campos después de enviar la petición al servidor
        $(':input[type="text"], :input[type="number"]').each(function () {
            $(this).val("");
        });
        $('#comments').val("");
        $(':checkbox').each(function () {
            $(this).prop("checked", false);
        });
        $(':radio').each(function () {
            $(this).prop("checked", false);
        });
        $('#btn-confirm').prop("disabled", true);
        $('.form-validate').removeClass('form-validate-success');
    }

    function multiPackageCalculator() {
        var valGroup1 = $('#prod-quantity-group1').val() * $('#package-quantity-group1').val();
        var valGroup2 = $('#prod-quantity-group2').val() * $('#package-quantity-group2').val();
        var valGroup3 = $('#prod-quantity-group3').val() * $('#package-quantity-group3').val();
        var valGroup4 = $('#prod-quantity-group4').val() * $('#package-quantity-group4').val();

        $('#count-result').html(valGroup1 + valGroup2 + valGroup3 + valGroup4);
    }

    function validateMultiPackage(teamGroup){
        if ($('input[name="package-type-'+teamGroup+'"]:checked').val()){
            $('input[name="prod-quantity-'+teamGroup+'"]').prop('disabled',false);
            $('input[name="package-quantity-'+teamGroup+'"]').prop('disabled',false);
        } else {
            $('input[name="prod-quantity-'+teamGroup+'"]').prop('disabled',true);
            $('input[name="package-quantity-'+teamGroup+'"]').prop('disabled',true);
        }
    }

    $('#app').css('margin-bottom',marginBottom);
    $('.modal-body').css('margin-top',marginTop).css('margin-bottom',marginBottom);

    $('#prod-location').keyup(function () {
        validateLocation('#prod-location','#prod-location-retype');
    });

    $('#prod-location-retype').keyup(function () {
        validateLocation('#prod-location-retype','#prod-location');
    });

    $('#code-search').submit(function () {
        var context = "#code";
        $(context).val($(context).val().trim().toUpperCase());
        $("#head-prod-image img").prop("src", "//qpselectric.com/apps/inventarios/img/preloading.gif");
        $.ajax({
            url: "controllers/CodeSearchController.php",
            method: "POST",
            data: $('#code-search').serialize(),
            dataType: 'json'
        }).done(function (productData) {
            if (productData.name !== null) {
                emptyFields();
                $("#head-prod-name").text(productData.name);
                $("#head-prod-reference").text(productData.code);
                $("#prod-reference").val(productData.code);
                $("#prod-name").val(productData.name);
                $("#col-prod-reference").removeClass('show').addClass('hide');
                $("#col-prod-name").removeClass('show').addClass('hide');
                $("#head-prod-image img").prop("src", "//empresasnoffra.com/img/catalogo/" + productData.code + ".jpg");
                $("#not-found").prop("checked", false);
                $("#quarantine-yes").prop("checked", false).prop("disabled", false);
                $("#quarantine-no").prop("checked", true).prop("disabled", false);
            } else {
                emptyFields();
                $("#head-prod-name").text("Producto no encontrado");
                $("#head-prod-reference").text("Producto no encontrado");
                $("#prod-reference").val(productData.code);
                $("#prod-name").val(null);
                $("#col-prod-reference").removeClass('hide').addClass('show');
                $("#col-prod-name").removeClass('hide').addClass('show');
                $("#head-prod-image img").prop("src", "./img/no-image.png");
                $("#not-found").prop("checked", true);
                $("#quarantine-yes").prop("checked", true).prop("disabled", true);
                $("#quarantine-no").prop("checked", false).prop("disabled", true);
            }
        }).fail(function () {
            alertMessage.addClass('item-error');
            alertMessage.find('.alert-title').html('<i class="fas fa-exclamation-triangle"></i> Atención');
            alertMessage.find('.alert-text').text('Ocurrio un error al cargar el producto. Intenta de nuevo.');
            $('#alert-message:hidden:first').slideDown(250);
            //setTimeout(alertHide, 4000);
        });

        return false;
    });

    // Validacion para mostrar el boton "Enviar"
    $('#store-product-list input').on('keyup click touch',function(){
        if ($('#prod-reference').val() && $('#prod-name').val() && $('#prod-quantity').val() && $('#prod-location').val() && $('#prod-location-retype').val() && $('#prod-location').val() === $('#prod-location-retype').val() && $('input[name="team"]:checked').val() && $('input[name="count"]:checked').val() && $('input[name="prod-location-size"]:checked').val() && $('input[name="prod-location-others"]:checked').val() && $('input[name*="brand"]:checked').val() && $('input[name="package-type"]:checked').val() && $('input[name="cond-pkg"]:checked').val() && $('input[name="cond-prod"]:checked').val()) {
            $('#btn-confirm').prop('disabled',false);
        } else {
            $('#btn-confirm').prop('disabled',true);
        }
    });

    $('#multi-packages input').on('keyup click touch',function(){
        multiPackageCalculator();
        validateMultiPackage('group1');
        validateMultiPackage('group2');
        validateMultiPackage('group3');
        validateMultiPackage('group4');
        
    });

    // Boton para cerrar los mensajes
    alertMessage.find('.btn-close').click(function () {
        alertHide();
    });

    // Boton del formulario para abrir el modal
    $('#btn-confirm').click(function (e) {
        var inputReference = $('#prod-reference').val();
        var inputName = $('#prod-name').val();
        var inputTeam = ($('input[name="team"]').is(':checked')) ? $('input[name="team"]:checked').val() : 'Sin datos';
        var inputCount = ($('input[name="count"]').is(':checked')) ? $('input[name="count"]:checked').val() : 'Sin datos';
        var inputLocation = $('#prod-location').val();
        var inputLocationSize = ($('input[name="prod-location-size"]').is(':checked')) ? $('input[name="prod-location-size"]:checked').val() : 'Sin datos';
        var inputLocationOthers = ($('input[name="prod-location-others"]').is(':checked')) ? $('input[name="prod-location-others"]:checked').val() : 'Sin datos';
        var inputLocationWrong = $('input[name="prod-location-wrong"]').val();        
        var inputQuantity = $('#prod-quantity').val();
        var inputBrandHarfon = ($('#brand-harfon').is(':checked')) ? 'HARF ' : '';
        var inputBrandWps = ($("#brand-wps").is(':checked')) ? 'WPS ' : '';
        var inputBrandTras = ($("#brand-tras").is(':checked')) ? 'TRAS ' : '';
        var inputBrandZen = ($("#brand-zen").is(':checked')) ? 'ZEN ' : '';
        var inputBrandBlank = ($("#brand-blank").is(':checked')) ? 'BLAN ' : '';
        var inputBrandOther = ($("#brand-other").is(':checked')) ? 'OTRA' : '';
        var inputTypePackage = ($('input[name="package-type"]').is(':checked')) ? $('input[name="package-type"]:checked').val() : 'Sin datos';
        var inputCondPackage = ($('input[name="cond-pkg"]').is(':checked')) ? $('input[name="cond-pkg"]:checked').val() : 'Sin datos';
        var inputCondProduct = ($('input[name="cond-prod"]').is(':checked')) ? $('input[name="cond-prod"]:checked').val() : 'Sin datos';
        var inputRevision = ($('input[name="ask-revision"]').is(':checked')) ? $('input[name="ask-revision"]:checked').val() : 'Sin datos';
        var inputQuarantine = ($('input[name="quarantine"]').is(':checked')) ? $('input[name="quarantine"]:checked').val() : 'Sin datos';
        var inputComments = $('#comments').val();
        var inputTypePackageGroup1 = ($('input[name="package-type-group1"]').is(':checked')) ? $('input[name="package-type-group1"]:checked').val() : '';
        var inputPackageQuantityGroup1 = $('#package-quantity-group1').val();
        var inputProductQuantityGroup1 = $('#prod-quantity-group1').val();
        var inputTypePackageGroup2 = ($('input[name="package-type-group2"]').is(':checked')) ? $('input[name="package-type-group2"]:checked').val() : '';
        var inputPackageQuantityGroup2 = $('#package-quantity-group2').val();
        var inputProductQuantityGroup2 = $('#prod-quantity-group2').val();
        var inputTypePackageGroup3 = ($('input[name="package-type-group3"]').is(':checked')) ? $('input[name="package-type-group3"]:checked').val() : '';
        var inputPackageQuantityGroup3 = $('#package-quantity-group3').val();
        var inputProductQuantityGroup3 = $('#prod-quantity-group3').val();
        var inputTypePackageGroup4 = ($('input[name="package-type-group4"]').is(':checked')) ? $('input[name="package-type-group4"]:checked').val() : '';
        var inputPackageQuantityGroup4 = $('#package-quantity-group4').val();
        var inputProductQuantityGroup4 = $('#prod-quantity-group4').val();
        var multiPackageTotal = $('#count-result').text();

        e.preventDefault();
        window.scrollTo(0,0);
        modalConfirm.scrollTop(0);
        modalConfirm.fadeIn(250);
        $('body').addClass('disable-scrollbar');
        
        $('#conf-reference').text(inputReference);
        $('#conf-name').text(inputName);
        $('#conf-location td').text(inputLocation);
        $('#conf-location-size td').text(inputLocationSize);
        $('#conf-location-others td').text(inputLocationOthers);
        $('#conf-location-wrong td').text(inputLocationWrong);        
        $('#conf-qty').text('Cantidad: '+inputQuantity);
        $('#conf-brand td').text(inputBrandHarfon + inputBrandWps + inputBrandTras + inputBrandZen + inputBrandBlank + inputBrandOther);
        $('#conf-type-pkg td').text(inputTypePackage);
        $('#conf-cond-pkg td').text(inputCondPackage);
        $('#conf-cond-prod td').text(inputCondProduct);
        $('#conf-ask-revision td').text(inputRevision);
        $('#conf-quarantine td').text(inputQuarantine);
        $('#conf-team td').text(inputTeam);
        $('#conf-count td').text(inputCount);
        $('#conf-comments').text(inputComments);
        $('#conf-group1').html('<td>'+inputTypePackageGroup1+'</td><td>'+inputProductQuantityGroup1+'</td><td>'+inputPackageQuantityGroup1+'</td>');
        $('#conf-group2').html('<td>'+inputTypePackageGroup2+'</td><td>'+inputProductQuantityGroup2+'</td><td>'+inputPackageQuantityGroup2+'</td>');
        $('#conf-group3').html('<td>'+inputTypePackageGroup3+'</td><td>'+inputProductQuantityGroup3+'</td><td>'+inputPackageQuantityGroup3+'</td>');
        $('#conf-group4').html('<td>'+inputTypePackageGroup4+'</td><td>'+inputProductQuantityGroup4+'</td><td>'+inputPackageQuantityGroup4+'</td>');
        $('#conf-result').text(multiPackageTotal);

        if ($('input[name="package-type-group1"]:checked').val() || $('input[name="package-type-group2"]:checked').val() || $('input[name="package-type-group3"]:checked').val() || $('input[name="package-type-group4"]:checked').val()) {
            $('#conf-multi-package').removeClass('hide').addClass('show');
        } else {
            $('#conf-multi-package').removeClass('show').addClass('hide');
        }

        if ($('input[name="package-type-group1"]:checked').val()) {
            $('#conf-group1').removeClass('hide').addClass('table-row');
        } else {
            $('#conf-group1').removeClass('table-row').addClass('hide');
        }

        if ($('input[name="package-type-group2"]:checked').val()) {
            $('#conf-group2').removeClass('hide').addClass('table-row');
        } else {
            $('#conf-group2').removeClass('table-row').addClass('hide');
        }

        if ($('input[name="package-type-group3"]:checked').val()) {
            $('#conf-group3').removeClass('hide').addClass('table-row');
        } else {
            $('#conf-group3').removeClass('table-row').addClass('hide');
        }

        if ($('input[name="package-type-group4"]:checked').val()) {
            $('#conf-group4').removeClass('hide').addClass('table-row');
        } else {
            $('#conf-group4').removeClass('table-row').addClass('hide');
        }
        
    });

    // Boton del modal para corregir los campos del formulario
    $('#btn-review').click(function (e) {
        e.preventDefault();
        modalConfirm.fadeOut(500).scrollTop(0);
        modalConfirm.addClass('hide');
        window.scrollTo(0,0);
        $('body').removeClass('disable-scrollbar');
    });

    // Boton del modal para enviar los datos del formulario
    $('#btn-store').click(function () {
        modalConfirm.fadeOut(500).scrollTop(0);
        modalConfirm.addClass('hide');
        window.scrollTo(0,0);
        $('body').removeClass('disable-scrollbar');

        $(':disabled').each(function () {
            $(this).removeAttr('disabled');
        });

        $.ajax({
            url: "controllers/StoreProductController.php",
            method: "POST",
            data: $('#store-product-list').serialize()
        }).done(function (data) {
            alertMessage.addClass('item-success');
            alertMessage.find('.alert-title').html('<i class="far fa-check-circle"></i> Atención');
            alertMessage.find('.alert-text').text('El producto fue guardado exitosamente.');
            $('#alert-message:hidden:first').slideDown(250);
            $("#head-prod-image img").prop("src", "./img/default.png");
            $('#head-prod-reference').text('Cod.');
            $('#head-prod-name').text('Descripción');
            emptyFields();
            //setTimeout(alertHide, 4000);
        }).fail(function () {
            alertMessage.addClass('item-error');
            alertMessage.find('.alert-title').html('<i class="fas fa-exclamation-triangle"></i> Atención');
            alertMessage.find('.alert-text').text('Ocurrio un error al cargar la información del producto. Intenta de nuevo.');
            $('#alert-message:hidden:first').slideDown(250);
            //setTimeout(alertHide, 4000);
        });

        return false;
    });
});