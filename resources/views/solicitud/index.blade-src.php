<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Solicitud</title>
    <style>
        .validation {
            color: #ff0000;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Solicitudes SISCORP</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                *Campos obligatorios
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Registro</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="registro_oficio" class="form-label">*Número de oficio:</label>
                    <input class="form-control registro input-text"
                        oninput="this.value = this.value.replace(/[^0-9A-Za-záéíóúÁÉÍÓÚñÑ\/\-\(\)\.\,\;\s\:]/g,'')"
                        id="registro_oficio" type="text" placeholder="Ingresa número de oficio..." maxlength="255"
                        autofocus required>
                    <label for="registro_oficio" class="form-label count" id="count_registro_oficio"></label>
                    <label for="registro_oficio" class="form-label validation" id="validation_registro_oficio"></label>
                </div>
            </div>
            <!--<div class="col">
                <div class="mb-3">
                    <label for="registro_oficio_fecha" class="form-label">*Fecha:</label>
                    <input class="form-control registro" id="registro_oficio_fecha" type="date" required>
                </div>
            </div>-->
            <div class="col">
                <div class="mb-3">
                    <label for="registro_oficio_fecha" class="form-label">*Fecha:</label>
                    <input class="form-control registro" id="registro_oficio_fecha" type="text" placeholder="DD/MM/YYYY"
                        required autocomplete="off">
                    <label for="registro_oficio_fecha" class="form-label validation"
                        id="validation_registro_oficio_fecha"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="registro_nombre" class="form-label">*Nombre(s):</label>
                <input class="form-control registro input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')" id="registro_nombre"
                    type="text" placeholder="Ingresa nombre(s)..." maxlength="50" required>
                <label for="registro_nombre" class="form-label count" id="count_registro_nombre"></label>
                <label for="registro_nombre" class="form-label validation" id="validation_registro_nombre"></label>
            </div>
            <div class="col">
                <label for="registro_apellido_paterno" class="form-label">*Apellido paterno:</label>
                <input class="form-control registro input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                    id="registro_apellido_paterno" type="text" placeholder="Ingresa apellido paterno(s)..."
                    maxlength="50" required>
                <label for="registro_apellido_paterno" class="form-label count"
                    id="count_registro_apellido_paterno"></label>
                <label for="registro_apellido_paterno" class="form-label validation"
                    id="validation_registro_apellido_paterno"></label>
            </div>
            <div class="col">
                <label for="registro_apellido_materno" class="form-label">Apellido materno:</label>
                <input class="form-control registro input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                    id="registro_apellido_materno" type="text" placeholder="Ingresa apellido materno..." maxlength="50">
                <label for="registro_apellido_materno" class="form-label count"
                    id="count_registro_apellido_materno"></label>
            </div>
            <div class="col">
                <label for="registro_email" class="form-label">*Correo electrónico:</label>
                <input class="form-control registro input-text email" id="registro_email" type="email"
                    placeholder="Ingresa correo electrónico..." maxlength="50" required>
                <label for="registro_email" class="form-label count" id="count_registro_email"></label>
                <label for="registro_email" class="form-label validation" id="validation_registro_email"></label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Datos del usuario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="solicitante_nombre" class="form-label">*Nombre(s):</label>
                <input class="form-control solicitante input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')" id="solicitante_nombre"
                    type="text" placeholder="Ingresa nombre(s)..." maxlength="50" autofocus required>
                <label for="solicitante_nombre" class="form-label count" id="count_solicitante_nombre"></label>
                <label for="solicitante_nombre" class="form-label validation"
                    id="validation_solicitante_nombre"></label>
            </div>
            <div class="col">
                <label for="solicitante_apellido_paterno" class="form-label">*Apellido paterno:</label>
                <input class="form-control solicitante input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                    id="solicitante_apellido_paterno" type="text" placeholder="Ingresa apellido paterno(s)..."
                    maxlength="50" required>
                <label for="solicitante_apellido_paterno" class="form-label count"
                    id="count_solicitante_apellido_paterno"></label>
                <label for="solicitante_apellido_paterno" class="form-label validation"
                    id="validation_solicitante_apellido_paterno"></label>
            </div>
            <div class="col">
                <label for="solicitante_apellido_materno" class="form-label">Apellido materno:</label>
                <input class="form-control solicitante input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                    id="solicitante_apellido_materno" type="text" placeholder="Ingresa apellido materno..."
                    maxlength="50">
                <label for="solicitante_apellido_materno" class="form-label count"
                    id="count_solicitante_apellido_materno"></label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="solicitante_curp" class="form-label">*CURP:</label>
                <input class="form-control solicitante input-text"
                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" id="solicitante_curp" type="text"
                    placeholder="Ingresa apellido paterno(s)..." maxlength="18" required>
                <label for="solicitante_curp" class="form-label count" id="count_solicitante_curp"></label>
                <label for="solicitante_curp" class="form-label validation" id="validation_solicitante_curp"></label>
            </div>
            <!--<div class="col">
                <div class="mb-3">
                    <label for="solicitante_fecha" class="form-label">*Fecha:</label>
                    <input class="form-control solicitante" id="solicitante_fecha" type="date" required>
                </div>
            </div>-->
            <div class="col">
                <div class="mb-3">
                    <label for="solicitante_fecha" class="form-label">*Fecha:</label>
                    <input class="form-control solicitante" id="solicitante_fecha" type="text" placeholder="DD/MM/YYYY"
                        required autocomplete="off">
                    <label for="solicitante_fecha" class="form-label validation"
                        id="validation_solicitante_fecha"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="unidad_administrativa_id" class="form-label">*Unidad administrativa</label>
                <select class="form-select solicitante" id="unidad_administrativa_id" required>
                    <option value="">--Selecciona unidad administrativa--</option>
                </select>
                <label for="unidad_administrativa_id" class="form-label validation"
                    id="validation_unidad_administrativa_id"></label>
            </div>
            <div class="col">
                <label for="unidad_administrativa_cargo_id" class="form-label">Cargo</label>
                <select class="form-select solicitante" id="unidad_administrativa_cargo_id" disabled>
                    <option value="">--Selecciona cargo--</option>
                </select>
            </div>
        </div>
        <div class="row" id="div-convenio" style="display: none">
            <div class="col">
                <label for="convenio_dependencia" class="form-label">Dependencia:</label>
                <input class="form-control convenio input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.\-\,\;\/\(\)]/g,'')"
                    id="convenio_dependencia" type="text" placeholder="Ingresa dependencia..." maxlength="300">
                <label for="convenio_dependencia" class="form-label count" id="count_convenio_dependencia"></label>
                <label for="convenio_dependencia" class="form-label validation"
                    id="validation_convenio_dependencia"></label>
            </div>
            <div class="col">
                <label for="convenio_puesto" class="form-label">Puesto:</label>
                <input class="form-control convenio input-text"
                    oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.\-\,\;\/\(\)]/g,'')"
                    id="convenio_puesto" type="text" placeholder="Ingresa puesto..." maxlength="255">
                <label for="convenio_puesto" class="form-label count" id="count_convenio_puesto"></label>
                <label for="convenio_puesto" class="form-label validation" id="validation_convenio_puesto"></label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="solicitante_ip" class="form-label">*IP:</label>
                <input class="form-control solicitante input-text" id="solicitante_ip" type="text"
                    placeholder="Ingresa IP..." maxlength="255" required>
                <label for="solicitante_ip" class="form-label count" id="count_solicitante_ip"></label>
                <label for="solicitante_ip" class="form-label validation" id="validation_solicitante_ip"></label>
            </div>
            <div class="col">
                <label for="solicitante_telefono" class="form-label">*Whatsapp:</label>
                <input class="form-control solicitante input-text" id="solicitante_telefono"
                    oninput="this.value = this.value.replace(/[^0-9]/g,'')" type="text"
                    placeholder="Ingresa Whatsapp..." maxlength="10" required>
                <label for="solicitante_telefono" class="form-label count" id="count_solicitante_telefono"></label>
                <label for="solicitante_telefono" class="form-label validation"
                    id="validation_solicitante_telefono"></label>
            </div>
            <div class="col">
                <label for="solicitante_email" class="form-label">*Correo electrónico:</label>
                <input class="form-control solicitante input-text email" id="solicitante_email" type="text"
                    placeholder="Ingresa correo electrónico..." maxlength="255" required>
                <label for="solicitante_email" class="form-label count" id="count_solicitante_email"></label>
                <label for="solicitante_email" class="form-label validation" id="validation_solicitante_email"></label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Control</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Marque con una (X) el requerimiento
            </div>
        </div>
        <div class="row" id="div-control"></div>
        <div class="row">
            <div class="col">
                <h1>Autorización</h1>
            </div>
        </div>
        <div class="row">
            <div class="col" id="div-autorizaciones">Selecciona unidad administrativa para continuar...</div>
        </div>
        <div class="row">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Acciones del formulario">
                    <button type="button" class="btn-secondary" id="btn-generar-solicitud">
                        <i class="fas fa-file-alt"></i> Generar solicitud
                    </button>
                    <button type="button" class="btn" id="btn-limpiar">
                        <i class="fas fa-eraser"></i> Limpiar formulario
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <!-- jQuery 3.7.1 (última versión estable) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 2. LUEGO jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <!-- Localización en español para México -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/i18n/datepicker-es.min.js"></script>
    <script>
        $(document).ready(function () {

            $.datepicker.setDefaults($.datepicker.regional['es']);

            function initDatePicker(selector) {

                $(selector).datepicker({
                    dateFormat: 'dd/mm/yy',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1900:2030',
                    showAnim: 'fadeIn',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                    firstDay: 1
                });
            }

            initDatePicker("#registro_oficio_fecha");

            initDatePicker("#solicitante_fecha");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function unidadAdministrativa() {

                if ($('#unidad_administrativa_id option').length !== 0) {

                    $('#unidad_administrativa_id').empty();

                    $('#unidad_administrativa_id').append($('<option>', {
                        value: "",
                        text: "--Selecciona unidad administrativa--"
                    }));

                }

                $("#unidad_administrativa_id").val("");

                Swal.fire({
                    title: 'Obteniendo unidades administrativas...',
                    html: 'Espera...',
                    allowOutsideClick: false,
                    backdrop: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "/api/unidades-administrativas/activas",
                    type: "GET",
                    datatype: "json",
                    /*data: {
                        remitente_codigo_postal: this.value
                    },*/
                    success: function (response) {

                        Swal.close();

                        if (parseInt(response.error) == 1) {

                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 27000,
                                timerProgressBar: true,
                                backdrop: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#235B4E',
                            });

                        }

                        if (parseInt(response.error) == 0) {

                            $.each(response.data, function (index, item) {
                                $("#unidad_administrativa_id").append($('<option>', {
                                    value: item.value,
                                    text: item.text
                                }));
                            });

                        }
                    },
                    error: function (jqXHR, exception) {

                        Swal.close();

                        let message;

                        if (jqXHR.status === 0) {

                            message = 'Not connect.\n Verify Network.';

                        } else if (jqXHR.status == 404) {

                            message = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 500) {

                            message = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {

                            message = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {

                            message = 'Time out error.';

                        } else if (exception === 'abort') {

                            message = 'Ajax request aborted.';

                        } else {

                            message = 'Uncaught Error.\n' + jqXHR.responseText;

                        }

                        Swal.fire({
                            icon: "error",
                            title: "Ocurrió un error en el servidor",
                            html: "<b>" + message + "</b>",
                            timer: 27000,
                            timerProgressBar: true,
                            backdrop: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#235B4E',
                        });

                    }
                });

            }

            unidadAdministrativa();

            function cargo() {

                if ($('#unidad_administrativa_cargo_id option').length !== 0) {

                    $('#unidad_administrativa_cargo_id').empty();

                    $('#unidad_administrativa_cargo_id').append($('<option>', {
                        value: "",
                        text: "--Selecciona cargo--"
                    }));

                }

                $("#unidad_administrativa_cargo_id").val("");

                Swal.fire({
                    title: 'Obteniendo cargos...',
                    html: 'Espera...',
                    allowOutsideClick: false,
                    backdrop: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "/api/cargos/activos",
                    type: "GET",
                    datatype: "json",
                    /*data: {
                        remitente_codigo_postal: this.value
                    },*/
                    success: function (response) {

                        Swal.close();

                        if (parseInt(response.error) == 1) {

                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 27000,
                                timerProgressBar: true,
                                backdrop: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#235B4E',
                            });

                        }

                        if (parseInt(response.error) == 0) {

                            $.each(response.data, function (index, item) {
                                $("#unidad_administrativa_cargo_id").append($('<option>', {
                                    value: item.value,
                                    text: item.text
                                }));
                            });

                        }
                    },
                    error: function (jqXHR, exception) {

                        Swal.close();

                        let message;

                        if (jqXHR.status === 0) {

                            message = 'Not connect.\n Verify Network.';

                        } else if (jqXHR.status == 404) {

                            message = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 500) {

                            message = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {

                            message = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {

                            message = 'Time out error.';

                        } else if (exception === 'abort') {

                            message = 'Ajax request aborted.';

                        } else {

                            message = 'Uncaught Error.\n' + jqXHR.responseText;

                        }

                        Swal.fire({
                            icon: "error",
                            title: "Ocurrió un error en el servidor",
                            html: "<b>" + message + "</b>",
                            timer: 27000,
                            timerProgressBar: true,
                            backdrop: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#235B4E',
                        });

                    }
                });

            }

            cargo();

            $("#unidad_administrativa_id").on("change", function () {

                $("#unidad_administrativa_cargo_id").prop('disabled', true);

                $("#unidad_administrativa_cargo_id").prop('required', false);

                $("#unidad_administrativa_cargo_id").val("");

                $("#div-convenio").hide();

                $(".convenio").val("");

                $(".convenio").prop('required', false);

                $("#div-autorizaciones").html("Selecciona unidad administrativa para continuar...")

                if (
                    $(this).val() != "" &&
                    $(this).find('option:selected').text() != "OTRO (CONVENIOS)"
                ) {

                    $("#unidad_administrativa_cargo_id").prop('disabled', false);

                    $("#unidad_administrativa_cargo_id").prop('required', true);

                    autorizacion($(this).val());

                } else if (
                    $(this).val() != "" &&
                    $(this).find('option:selected').text() == "OTRO (CONVENIOS)"
                ) {

                    $("#div-convenio").show();

                    $(".convenio")[0].focus();

                    $(".convenio").prop('required', true);

                    autorizacion($(this).val());

                }

            });

            function controlTransporte() {

                $("#div-control").empty();

                Swal.fire({
                    title: 'Obteniendo controles vehiculares...',
                    html: 'Espera...',
                    allowOutsideClick: false,
                    backdrop: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "/api/control-transporte/activos",
                    type: "GET",
                    datatype: "json",
                    /*data: {
                        remitente_codigo_postal: this.value
                    },*/
                    success: function (response) {

                        Swal.close();

                        if (parseInt(response.error) == 1) {

                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 27000,
                                timerProgressBar: true,
                                backdrop: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#235B4E',
                            });

                        }

                        if (parseInt(response.error) == 0) {

                            for (
                                let i = 0;
                                i < response.data.length;
                                i++
                            ) {

                                if (
                                    !$("#" + response.data[i]["transporte_nombre"]).length > 0
                                ) {

                                    $("#div-control").append(
                                        `<div class="col" id="${response.data[i]["transporte_nombre"]}"><h4>${response.data[i]["transporte_nombre"]}</h4></div>`
                                    );

                                }

                            }

                            for (
                                let j = 0;
                                j < response.data.length;
                                j++
                            ) {

                                if (
                                    $("#" + response.data[j]["transporte_nombre"]).length > 0
                                ) {

                                    $("#" + response.data[j]["transporte_nombre"]).append(
                                        `<div class="form-check">
                                            <input class="form-check-input control_solicitante" type="checkbox" value="${response.data[j]["control_id"]}" id="control_solicitante_${j}">
                                            <label class="form-check-label" for="control_solicitante_${j}">
                                                ${response.data[j]["control_nombre"]}
                                            </label>
                                        </div>`
                                    );

                                }

                            }

                        }
                    },
                    error: function (jqXHR, exception) {

                        Swal.close();

                        let message;

                        if (jqXHR.status === 0) {

                            message = 'Not connect.\n Verify Network.';

                        } else if (jqXHR.status == 404) {

                            message = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 500) {

                            message = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {

                            message = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {

                            message = 'Time out error.';

                        } else if (exception === 'abort') {

                            message = 'Ajax request aborted.';

                        } else {

                            message = 'Uncaught Error.\n' + jqXHR.responseText;

                        }

                        Swal.fire({
                            icon: "error",
                            title: "Ocurrió un error en el servidor",
                            html: "<b>" + message + "</b>",
                            timer: 27000,
                            timerProgressBar: true,
                            backdrop: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#235B4E',
                        });

                    }
                });

            }

            controlTransporte();

            function autorizacion(
                unidadAdministrativaId
            ) {

                $("#div-autorizaciones").empty();

                Swal.fire({
                    title: 'Obteniendo autorizaciones...',
                    html: 'Espera...',
                    allowOutsideClick: false,
                    backdrop: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '/api/autorizacion-unidad-administrativa',
                    type: "POST",
                    datatype: "json",
                    data: {
                        unidad_administrativa_id: unidadAdministrativaId
                    },
                    success: function (response) {

                        Swal.close();

                        if (parseInt(response.error) == 1) {

                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 27000,
                                timerProgressBar: true,
                                backdrop: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#235B4E',
                            });

                        }

                        if (parseInt(response.error) == 0) {

                            for (
                                let i = 0;
                                i < response.data.length;
                                i++
                            ) {

                                $("#div-autorizaciones").append(
                                    `<div class="form-check">
                                        <input class="form-check-input autorizacion_solicitante" type="checkbox" value="${response.data[i]["autorizacion_id"]}" id="autorizacion_solicitante_${i}">
                                        <label class="form-check-label" for="autorizacion_solicitante_${i}">
                                            ${response.data[i]["autorizacion_nombre"]}
                                        </label>
                                    </div>`
                                );

                            }

                        }
                    },
                    error: function (jqXHR, exception) {

                        Swal.close();

                        let message;

                        if (jqXHR.status === 0) {

                            message = 'Not connect.\n Verify Network.';

                        } else if (jqXHR.status == 404) {

                            message = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 500) {

                            message = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {

                            message = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {

                            message = 'Time out error.';

                        } else if (exception === 'abort') {

                            message = 'Ajax request aborted.';

                        } else {

                            message = 'Uncaught Error.\n' + jqXHR.responseText;

                        }

                        Swal.fire({
                            icon: "error",
                            title: "Ocurrió un error en el servidor",
                            html: "<b>" + message + "</b>",
                            timer: 27000,
                            timerProgressBar: true,
                            backdrop: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#235B4E',
                        });

                    }
                });

            }

            $(document).on('input', '.input-text', function () {

                $(`#count_${this.id}`).html(this.value.length > 0 ? this.value.length + "/" + this.maxLength : "");

            });

            $("#btn-limpiar").on("click", function () {
                limpiarFormulario();
            });

            function limpiarFormulario() {

                $(".registro").val("");

                $(".solicitante ").val("");

                $("#unidad_administrativa_cargo_id").prop('disabled', true);

                $("#unidad_administrativa_cargo_id").prop('required', false);

                $("#unidad_administrativa_cargo_id").val("");

                $("#div-convenio").hide();

                $(".convenio").val("");

                $(".convenio").prop('required', false);

                $("#div-autorizaciones").html("Selecciona unidad administrativa para continuar...");

                $(".registro")[0].focus();

                $(".validation").html("");

                $(".registro, .solicitante, .convenio").css('border', '');

                $(".count").html("");

                controlTransporte();

            }

            $("#btn-generar-solicitud").on("click", function () {

                let validarResultado = validar();

                if (
                    validarResultado.error == 1
                ) {

                    Swal.fire({
                        icon: "error",
                        title: validarResultado.message,
                        timer: 27000,
                        timerProgressBar: true,
                        backdrop: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#235B4E',
                    });

                    return;

                }

                const registroInputsValues = {};

                $(".registro").each(function () {

                    const id = $(this).attr('id');

                    const value = $(this).val();

                    registroInputsValues[id] = value.toUpperCase();
                });

                const solicitanteInputsValues = {};

                $(".solicitante").each(function () {

                    const id = $(this).attr('id');

                    const value = $(this).val();

                    solicitanteInputsValues[id] = value.toUpperCase();
                });


                const convenioInputsValues = {};

                $(".convenio").each(function () {

                    const id = $(this).attr('id');

                    const value = $(this).val();

                    convenioInputsValues[id] = value.toUpperCase();
                });

                const controlInputsValues = $(".control_solicitante:checked").map(function () {
                    return $(this).val();
                }).get();

                const autorizacionValores = $(".autorizacion_solicitante:checked").map(function () {
                    return $(this).val();
                }).get();


                $.ajax({
                    url: '/api/procesar-solicitud',
                    type: "POST",
                    datatype: "json",
                    data: {
                        registro: registroInputsValues,
                        solicitante: solicitanteInputsValues,
                        convenio: convenioInputsValues,
                        control: controlInputsValues,
                        autorizacion: autorizacionValores
                    },
                    success: function (response) {

                        Swal.close();

                        if (parseInt(response.error) == 1) {

                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 27000,
                                timerProgressBar: true,
                                backdrop: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#235B4E',
                            });

                        }

                        if (parseInt(response.error) == 0) {

                            for (
                                let i = 0;
                                i < response.data.length;
                                i++
                            ) {

                                $("#div-autorizaciones").append(
                                    `<div class="form-check">
                                        <input class="form-check-input autorizacion_solicitante" type="checkbox" value="${response.data[i]["autorizacion_id"]}" id="autorizacion_solicitante_${i}">
                                        <label class="form-check-label" for="autorizacion_solicitante_${i}">
                                            ${response.data[i]["autorizacion_nombre"]}
                                        </label>
                                    </div>`
                                );

                            }

                        }
                    },
                    error: function (jqXHR, exception) {

                        Swal.close();

                        let message;

                        if (jqXHR.status === 0) {

                            message = 'Not connect.\n Verify Network.';

                        } else if (jqXHR.status == 404) {

                            message = 'Requested page not found. [404]';

                        } else if (jqXHR.status == 500) {

                            message = 'Internal Server Error [500].';

                        } else if (exception === 'parsererror') {

                            message = 'Requested JSON parse failed.';

                        } else if (exception === 'timeout') {

                            message = 'Time out error.';

                        } else if (exception === 'abort') {

                            message = 'Ajax request aborted.';

                        } else {

                            message = 'Uncaught Error.\n' + jqXHR.responseText;

                        }

                        Swal.fire({
                            icon: "error",
                            title: "Ocurrió un error en el servidor",
                            html: "<b>" + message + "</b>",
                            timer: 27000,
                            timerProgressBar: true,
                            backdrop: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#235B4E',
                        });

                    }
                });


            });

            function validar() {

                const registro = $(".registro, .solicitante, .convenio");

                registro.css('border', '');

                $(".validation").html("");

                let registroValidacion = true;

                for (
                    let k = 0;
                    k < registro.length;
                    k++
                ) {

                    registro[k].style.border = "";

                    if (
                        registro[k].required &&
                        registro[k].value == ""
                    ) {

                        registro[k].style.border = "3px solid #ff0000";

                        $(`#validation_${registro[k].id}`).html("Campo obligatorio");

                        registroValidacion = false;
                    }

                }

                if (
                    !registroValidacion
                ) {

                    return {
                        "error": 1,
                        "message": "Campos obligatorios vacíos..."
                    };

                }

                const controlValores = $(".control_solicitante:checked").map(function () {
                    return $(this).val();
                }).get();

                if (
                    controlValores.length == 0
                ) {

                    return {
                        "error": 1,
                        "message": "Selecciona por lo menos un tipo de control (GRIS, VERDE, ANTIGUO, etcétera)..."
                    };

                }

                const autorizacionValores = $(".autorizacion_solicitante:checked").map(function () {
                    return $(this).val();
                }).get();

                if (
                    autorizacionValores.length == 0
                ) {

                    return {
                        "error": 1,
                        "message": "Selecciona por lo menos un tipo de autorización (SÁBANAS VEHICULARES, ADEUDOS DE VEHÍCULOS, CONSULTAR SÁBANA DE LICENCIAS, etcétera)..."
                    };

                }

                return {
                    "error": 0,
                    "message": null
                }

            }

        });
    </script>
</body>

</html>