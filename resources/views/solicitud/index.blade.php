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
    <!-- Google Fonts - Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Solicitud</title>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f8f6f3;
        }

        /* ===== NAVBAR MÁS GRANDE ===== */
        .navbar {
            background-color: #9d2148 !important;
            box-shadow: 0 2px 10px rgba(157, 33, 72, 0.2);
            padding: 10px 0 !important;
            min-height: 60px;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            padding: 4px 0 !important;
        }

        .navbar-brand i {
            color: #b28e5c;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .navbar .container-fluid {
            padding: 0 20px !important;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 16px !important;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #ffffff !important;
            background-color: rgba(178, 142, 92, 0.3);
        }

        .nav-link i {
            margin-right: 6px;
            color: #b28e5c;
            font-size: 0.85rem;
        }

        .navbar-toggler {
            padding: 6px 10px !important;
            font-size: 1rem;
            border-color: rgba(255, 255, 255, 0.3);
        }

        .navbar-toggler-icon {
            width: 1.4em;
            height: 1.4em;
            filter: brightness(0) invert(1);
        }

        @media (max-width: 992px) {
            .navbar-nav {
                padding: 10px 0;
            }

            .nav-link {
                padding: 10px 16px !important;
                font-size: 1rem;
            }
        }

        .container-fluid {
            padding: 30px 40px;
            max-width: 1600px;
            margin: 0 auto;
        }

        .main-header {
            background: linear-gradient(135deg, #9d2148 0%, #7a1a38 100%);
            padding: 25px 35px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(157, 33, 72, 0.2);
            position: relative;
            overflow: hidden;
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(178, 142, 92, 0.08);
            border-radius: 50%;
        }

        .main-header h1 {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.8rem;
            margin: 0;
            letter-spacing: 1px;
        }

        .main-header h1 i {
            color: #b28e5c;
            margin-right: 12px;
        }

        .main-header .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
            font-size: 0.95rem;
            margin-top: 4px;
        }

        .section-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px 30px;
            margin-bottom: 25px;
            box-shadow: 0 2px 12px rgba(85, 88, 90, 0.08);
            border-left: 4px solid #b28e5c;
            transition: all 0.3s ease;
        }

        .section-card:hover {
            box-shadow: 0 4px 20px rgba(85, 88, 90, 0.12);
        }

        .section-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: #9d2148;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0ede8;
            display: flex;
            align-items: center;
        }

        .section-title i {
            color: #b28e5c;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .section-title .badge-required {
            background-color: #9d2148;
            color: #fff;
            font-size: 0.6rem;
            padding: 2px 10px;
            border-radius: 12px;
            margin-left: 12px;
            font-weight: 500;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.85rem;
            color: #55585a;
            margin-bottom: 4px;
        }

        .form-label .required-star {
            color: #9d2148;
            font-weight: 700;
            margin-left: 2px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1.5px solid #e0ddd8;
            padding: 10px 14px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background-color: #faf9f7;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #b28e5c;
            box-shadow: 0 0 0 3px rgba(178, 142, 92, 0.15);
            background-color: #ffffff;
        }

        .form-control::placeholder {
            color: #b5b3af;
            font-weight: 300;
        }

        .form-check-input {
            border: 1.5px solid #d0cdc8;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #9d2148;
            border-color: #9d2148;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #55585a;
            cursor: pointer;
        }

        .form-check {
            padding: 4px 0;
        }

        .validation {
            color: #9d2148;
            font-weight: 500;
            font-size: 0.8rem;
            margin-top: 2px;
        }

        .count {
            color: #b5b3af;
            font-size: 0.75rem;
            font-weight: 300;
            float: right;
        }

        .btn-group-custom {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .btn-primary-custom {
            background-color: #9d2148;
            color: #ffffff;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary-custom:hover {
            background-color: #7a1a38;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(157, 33, 72, 0.3);
        }

        .btn-secondary-custom {
            background-color: #e8e5e0;
            color: #55585a;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-secondary-custom:hover {
            background-color: #d5d1cb;
            color: #3a3c3e;
            transform: translateY(-1px);
        }

        .required-hint {
            color: #b5b3af;
            font-size: 0.8rem;
            font-weight: 300;
            margin-bottom: 15px;
        }

        .required-hint i {
            color: #9d2148;
            margin-right: 4px;
        }

        .checkbox-group {
            background: #faf9f7;
            border-radius: 8px;
            padding: 15px 20px;
            margin-top: 5px;
        }

        /* ===== ESTILO PARA CATEGORÍAS DE CONTROL EN COL-12 ===== */
        .control-categoria {
            width: 100%;
            padding: 14px 0;
            border-bottom: 1px solid #e8e5e0;
        }

        .control-categoria:last-child {
            border-bottom: none;
        }

        .control-categoria h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #9d2148;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .control-categoria h4 i {
            color: #b28e5c;
            font-size: 0.9rem;
        }

        .control-categoria .opciones {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 30px;
            padding-left: 28px;
        }

        .control-categoria .opciones .form-check {
            padding: 3px 0;
        }

        .control-categoria .opciones .form-check-label {
            font-size: 0.88rem;
        }

        .col-form-label {
            font-weight: 600;
            color: #9d2148;
        }

        .btn-generate {
            background: linear-gradient(135deg, #9d2148 0%, #7a1a38 100%);
            color: #fff;
            border: none;
            padding: 14px 40px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(157, 33, 72, 0.35);
            color: #fff;
        }

        .btn-generate i {
            color: #b28e5c;
        }

        .section-card.registro-section {
            border-left-color: #9d2148;
        }

        .section-card.usuario-section {
            border-left-color: #b28e5c;
        }

        .section-card.control-section {
            border-left-color: #55585a;
        }

        .section-card.autorizacion-section {
            border-left-color: #9d2148;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding: 15px;
            }

            .main-header {
                padding: 20px;
            }

            .main-header h1 {
                font-size: 1.3rem;
            }

            .section-card {
                padding: 18px 20px;
            }

            .btn-group-custom {
                flex-direction: column;
            }

            .btn-primary-custom,
            .btn-secondary-custom,
            .btn-generate {
                width: 100%;
                justify-content: center;
            }

            .navbar-brand {
                font-size: 1.1rem !important;
            }

            .control-categoria .opciones {
                padding-left: 10px;
                gap: 5px 15px;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        .form-select:disabled {
            background-color: #f0ede8;
            cursor: not-allowed;
        }

        .form-control:required,
        .form-select:required {
            border-left: 3px solid #b28e5c;
        }

        .form-control:required:invalid,
        .form-select:required:invalid {
            border-left-color: #9d2148;
        }

        /* Forzar vertical en Bootstrap */
        .opciones {
            display: flex;
            flex-direction: column !important;
        }

        .opciones .form-check {
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            padding: 5px 0 !important;
        }

        .opciones .form-check-input {
            margin: 0 !important;
            flex-shrink: 0 !important;
        }

        .opciones .form-check-label {
            margin: 0 !important;
        }
    </style>
</head>

<body>

    <!-- NAVBAR MÁS GRANDE -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-file-signature"></i> SISCORP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#registro-section">
                            <i class="fas fa-pen"></i> Registro
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#usuario-section">
                            <i class="fas fa-user"></i> Datos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#control-section">
                            <i class="fas fa-check-double"></i> Control
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#autorizacion-section">
                            <i class="fas fa-shield-alt"></i> Autorización
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        <!-- HEADER -->
        <div class="main-header">
            <h1><i class="fas fa-file-alt"></i> Solicitudes SISCORP</h1>
            <div class="subtitle">
                <i class="fas fa-asterisk" style="color: #b28e5c; font-size: 0.7rem;"></i>
                Complete todos los campos obligatorios para generar su solicitud
            </div>
        </div>

        <!-- ==================== REGISTRO ==================== -->
        <div id="registro-section" class="section-card registro-section">
            <div class="section-title">
                <i class="fas fa-pen-fancy"></i> Registro
                <span class="badge-required">Obligatorio</span>
            </div>
            <div class="required-hint">
                <i class="fas fa-asterisk"></i> Campos marcados con <strong style="color:#9d2148;">*</strong> son
                obligatorios
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="registro_oficio" class="form-label">
                            <i class="fas fa-hashtag" style="color:#b28e5c; width:18px;"></i>
                            Número de oficio <span class="required-star">*</span>
                        </label>
                        <input class="form-control registro input-text"
                            oninput="this.value = this.value.replace(/[^0-9A-Za-záéíóúÁÉÍÓÚñÑ\/\-\(\)\.\,\;\s\:]/g,'')"
                            id="registro_oficio" type="text" placeholder="Ingresa número de oficio..."
                            maxlength="255" autofocus required>
                        <label for="registro_oficio" class="form-label count" id="count_registro_oficio"></label>
                        <label for="registro_oficio" class="form-label validation"
                            id="validation_registro_oficio"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="registro_oficio_fecha" class="form-label">
                            <i class="fas fa-calendar-alt" style="color:#b28e5c; width:18px;"></i>
                            Fecha <span class="required-star">*</span>
                        </label>
                        <input class="form-control registro" id="registro_oficio_fecha" type="text"
                            placeholder="DD/MM/YYYY" required autocomplete="off">
                        <label for="registro_oficio_fecha" class="form-label validation"
                            id="validation_registro_oficio_fecha"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="registro_nombre" class="form-label">
                            <i class="fas fa-user" style="color:#b28e5c; width:18px;"></i>
                            Nombre(s) <span class="required-star">*</span>
                        </label>
                        <input class="form-control registro input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                            id="registro_nombre" type="text" placeholder="Ingresa nombre(s)..." maxlength="50"
                            required>
                        <label for="registro_nombre" class="form-label count" id="count_registro_nombre"></label>
                        <label for="registro_nombre" class="form-label validation"
                            id="validation_registro_nombre"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="registro_apellido_paterno" class="form-label">
                            <i class="fas fa-user" style="color:#b28e5c; width:18px;"></i>
                            Apellido paterno <span class="required-star">*</span>
                        </label>
                        <input class="form-control registro input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                            id="registro_apellido_paterno" type="text"
                            placeholder="Ingresa apellido paterno(s)..." maxlength="50" required>
                        <label for="registro_apellido_paterno" class="form-label count"
                            id="count_registro_apellido_paterno"></label>
                        <label for="registro_apellido_paterno" class="form-label validation"
                            id="validation_registro_apellido_paterno"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="registro_apellido_materno" class="form-label">
                            <i class="fas fa-user" style="color:#b28e5c; width:18px;"></i>
                            Apellido materno
                        </label>
                        <input class="form-control registro input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                            id="registro_apellido_materno" type="text" placeholder="Ingresa apellido materno..."
                            maxlength="50">
                        <label for="registro_apellido_materno" class="form-label count"
                            id="count_registro_apellido_materno"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="registro_email" class="form-label">
                            <i class="fas fa-envelope" style="color:#b28e5c; width:18px;"></i>
                            Correo electrónico <span class="required-star">*</span>
                        </label>
                        <input class="form-control registro input-text email" id="registro_email" type="email"
                            placeholder="Ingresa correo electrónico..." maxlength="50" required>
                        <label for="registro_email" class="form-label count" id="count_registro_email"></label>
                        <label for="registro_email" class="form-label validation"
                            id="validation_registro_email"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== DATOS DEL USUARIO ==================== -->
        <div id="usuario-section" class="section-card usuario-section">
            <div class="section-title">
                <i class="fas fa-user-circle"></i> Datos del Usuario
                <span class="badge-required">Obligatorio</span>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="solicitante_nombre" class="form-label">
                            <i class="fas fa-user" style="color:#b28e5c; width:18px;"></i>
                            Nombre(s) <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                            id="solicitante_nombre" type="text" placeholder="Ingresa nombre(s)..." maxlength="50"
                            autofocus required>
                        <label for="solicitante_nombre" class="form-label count"
                            id="count_solicitante_nombre"></label>
                        <label for="solicitante_nombre" class="form-label validation"
                            id="validation_solicitante_nombre"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="solicitante_apellido_paterno" class="form-label">
                            <i class="fas fa-user" style="color:#b28e5c; width:18px;"></i>
                            Apellido paterno <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                            id="solicitante_apellido_paterno" type="text"
                            placeholder="Ingresa apellido paterno(s)..." maxlength="50" required>
                        <label for="solicitante_apellido_paterno" class="form-label count"
                            id="count_solicitante_apellido_paterno"></label>
                        <label for="solicitante_apellido_paterno" class="form-label validation"
                            id="validation_solicitante_apellido_paterno"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="solicitante_apellido_materno" class="form-label">
                            <i class="fas fa-user" style="color:#b28e5c; width:18px;"></i>
                            Apellido materno
                        </label>
                        <input class="form-control solicitante input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.]/g,'')"
                            id="solicitante_apellido_materno" type="text"
                            placeholder="Ingresa apellido materno..." maxlength="50">
                        <label for="solicitante_apellido_materno" class="form-label count"
                            id="count_solicitante_apellido_materno"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="solicitante_curp" class="form-label">
                            <i class="fas fa-id-card" style="color:#b28e5c; width:18px;"></i>
                            CURP <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante input-text"
                            oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" id="solicitante_curp"
                            type="text" placeholder="Ingresa CURP..." maxlength="18" required>
                        <label for="solicitante_curp" class="form-label count" id="count_solicitante_curp"></label>
                        <label for="solicitante_curp" class="form-label validation"
                            id="validation_solicitante_curp"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="solicitante_fecha" class="form-label">
                            <i class="fas fa-calendar-day" style="color:#b28e5c; width:18px;"></i>
                            Fecha <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante" id="solicitante_fecha" type="text"
                            placeholder="DD/MM/YYYY" required autocomplete="off">
                        <label for="solicitante_fecha" class="form-label validation"
                            id="validation_solicitante_fecha"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="unidad_administrativa_id" class="form-label">
                            <i class="fas fa-building" style="color:#b28e5c; width:18px;"></i>
                            Unidad administrativa <span class="required-star">*</span>
                        </label>
                        <select class="form-select solicitante" id="unidad_administrativa_id" required>
                            <option value="">-- Selecciona unidad administrativa --</option>
                        </select>
                        <label for="unidad_administrativa_id" class="form-label validation"
                            id="validation_unidad_administrativa_id"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="unidad_administrativa_cargo_id" class="form-label">
                            <i class="fas fa-briefcase" style="color:#b28e5c; width:18px;"></i>
                            Cargo
                        </label>
                        <select class="form-select solicitante" id="unidad_administrativa_cargo_id" disabled>
                            <option value="">-- Selecciona cargo --</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- CONVENIO -->
            <div class="row" id="div-convenio" style="display: none">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="convenio_dependencia" class="form-label">
                            <i class="fas fa-handshake" style="color:#b28e5c; width:18px;"></i>
                            Dependencia
                        </label>
                        <input class="form-control convenio input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.\-\,\;\/\(\)]/g,'')"
                            id="convenio_dependencia" type="text" placeholder="Ingresa dependencia..."
                            maxlength="300">
                        <label for="convenio_dependencia" class="form-label count"
                            id="count_convenio_dependencia"></label>
                        <label for="convenio_dependencia" class="form-label validation"
                            id="validation_convenio_dependencia"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="convenio_puesto" class="form-label">
                            <i class="fas fa-user-tie" style="color:#b28e5c; width:18px;"></i>
                            Puesto
                        </label>
                        <input class="form-control convenio input-text"
                            oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s\.\-\,\;\/\(\)]/g,'')"
                            id="convenio_puesto" type="text" placeholder="Ingresa puesto..." maxlength="255">
                        <label for="convenio_puesto" class="form-label count" id="count_convenio_puesto"></label>
                        <label for="convenio_puesto" class="form-label validation"
                            id="validation_convenio_puesto"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="solicitante_ip" class="form-label">
                            <i class="fas fa-network-wired" style="color:#b28e5c; width:18px;"></i>
                            IP <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante input-text" id="solicitante_ip" type="text"
                            placeholder="Ingresa IP..." maxlength="255" required>
                        <label for="solicitante_ip" class="form-label count" id="count_solicitante_ip"></label>
                        <label for="solicitante_ip" class="form-label validation"
                            id="validation_solicitante_ip"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="solicitante_telefono" class="form-label">
                            <i class="fab fa-whatsapp" style="color:#25D366; width:18px;"></i>
                            Whatsapp <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante input-text" id="solicitante_telefono"
                            oninput="this.value = this.value.replace(/[^0-9]/g,'')" type="text"
                            placeholder="Ingresa Whatsapp..." maxlength="10" required>
                        <label for="solicitante_telefono" class="form-label count"
                            id="count_solicitante_telefono"></label>
                        <label for="solicitante_telefono" class="form-label validation"
                            id="validation_solicitante_telefono"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="solicitante_email" class="form-label">
                            <i class="fas fa-envelope" style="color:#b28e5c; width:18px;"></i>
                            Correo electrónico <span class="required-star">*</span>
                        </label>
                        <input class="form-control solicitante input-text email" id="solicitante_email"
                            type="email" placeholder="Ingresa correo electrónico..." maxlength="255" required>
                        <label for="solicitante_email" class="form-label count" id="count_solicitante_email"></label>
                        <label for="solicitante_email" class="form-label validation"
                            id="validation_solicitante_email"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== CONTROL ==================== -->
        <div id="control-section" class="section-card control-section">
            <div class="section-title">
                <i class="fas fa-clipboard-list"></i> Control
                <span class="badge-required">Selección requerida</span>
            </div>
            <p style="color:#55585a; font-size:0.9rem; margin-bottom:15px;">
                <i class="fas fa-check-circle" style="color:#b28e5c;"></i>
                Marque con una (X) el requerimiento
            </p>
            <!-- ===== CONTENEDOR PARA CATEGORÍAS EN COL-12 ===== -->
            <div class="checkbox-group" id="div-control"></div>
            <!-- FIN CONTENEDOR -->
        </div>

        <!-- ==================== AUTORIZACIÓN ==================== -->
        <div id="autorizacion-section" class="section-card autorizacion-section">
            <div class="section-title">
                <i class="fas fa-shield-alt"></i> Autorización
                <span class="badge-required">Selección requerida</span>
            </div>
            <div class="checkbox-group" id="div-autorizaciones">
                <p style="color:#b5b3af; font-style:italic; margin:0;">
                    <i class="fas fa-info-circle" style="color:#b28e5c;"></i>
                    Selecciona unidad administrativa para continuar...
                </p>
            </div>
        </div>

        <!-- ==================== BOTONES ==================== -->
        <div class="section-card" style="border-left-color: #b28e5c; background: #faf9f7;">
            <div
                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap:15px;">
                <div class="btn-group-custom">
                    <button type="button" class="btn-generate" id="btn-generar-solicitud">
                        <i class="fas fa-file-alt"></i> Generar solicitud
                    </button>
                    <button type="button" class="btn-secondary-custom" id="btn-limpiar">
                        <i class="fas fa-eraser"></i> Limpiar formulario
                    </button>
                </div>
                <div style="color:#b5b3af; font-size:0.8rem;">
                    <i class="fas fa-asterisk" style="color:#9d2148;"></i> Todos los campos marcados son obligatorios
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
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

    <!-- ===== TU JAVASCRIPT ORIGINAL - SIN MODIFICAR ===== -->
    <script>
        $(document).ready(function() {

            $.datepicker.setDefaults($.datepicker.regional['es']);

            function initDatePicker(selector) {

                $(selector).datepicker({
                    dateFormat: 'dd/mm/yy',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1900:2030',
                    showAnim: 'fadeIn',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                        'Nov', 'Dic'
                    ],
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
                    success: function(response) {

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

                            $.each(response.data, function(index, item) {
                                $("#unidad_administrativa_id").append($('<option>', {
                                    value: item.value,
                                    text: item.text
                                }));
                            });

                        }
                    },
                    error: function(jqXHR, exception) {

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
                    success: function(response) {

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

                            $.each(response.data, function(index, item) {
                                $("#unidad_administrativa_cargo_id").append($('<option>', {
                                    value: item.value,
                                    text: item.text
                                }));
                            });

                        }
                    },
                    error: function(jqXHR, exception) {

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

            $("#unidad_administrativa_id").on("change", function() {

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
                    success: function(response) {

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

                            // ===== MODIFICACIÓN SOLO EN LA ESTRUCTURA HTML =====
                            // Cada categoría ocupa su propia fila (col-12)
                            for (let i = 0; i < response.data.length; i++) {

                                if (!$("#" + response.data[i]["transporte_nombre"]).length > 0) {

                                    $("#div-control").append(
                                        `<div class="control-categoria" id="${response.data[i]["transporte_nombre"]}">
                                            <h4><i class="fas fa-tag"></i> ${response.data[i]["transporte_nombre"]}</h4>
                                            <div class="opciones"></div>
                                        </div>`
                                    );
                                }
                            }

                            for (let j = 0; j < response.data.length; j++) {

                                if ($("#" + response.data[j]["transporte_nombre"]).length > 0) {

                                    $("#" + response.data[j]["transporte_nombre"] + " .opciones")
                                        .append(
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
                    error: function(jqXHR, exception) {

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
                    success: function(response) {

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
                                let i = 0; i < response.data.length; i++
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
                    error: function(jqXHR, exception) {

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

            $(document).on('input', '.input-text', function() {

                $(`#count_${this.id}`).html(this.value.length > 0 ? this.value.length + "/" + this
                    .maxLength : "");

            });

            $("#btn-limpiar").on("click", function() {
                limpiarFormulario();
            });

            function limpiarFormulario(
                toFocus = true
            ) {

                $(".registro").val("");

                $(".solicitante ").val("");

                $("#unidad_administrativa_cargo_id").prop('disabled', true);

                $("#unidad_administrativa_cargo_id").prop('required', false);

                $("#unidad_administrativa_cargo_id").val("");

                $("#div-convenio").hide();

                $(".convenio").val("");

                $(".convenio").prop('required', false);

                $("#div-autorizaciones").html("Selecciona unidad administrativa para continuar...");

                $(".validation").html("");

                $(".registro, .solicitante, .convenio").css('border', '');

                $(".count").html("");

                $("#div-control").css('background-color', '#faf9f7');

                $("#div-autorizaciones").css('background-color', '#faf9f7');

                controlTransporte();

                if (
                    toFocus
                ) {
                    $(".registro")[0].focus();

                }

            }

            $("#btn-generar-solicitud").on("click", function() {

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

                $(".registro").each(function() {

                    const id = $(this).attr('id');

                    const typeInput = $(this).attr('type');

                    const value = $(this).val();

                    registroInputsValues[id] = typeInput == "email" ? value.toLowerCase() : value
                        .toUpperCase();
                });

                const solicitanteInputsValues = {};

                $(".solicitante").each(function() {

                    const id = $(this).attr('id');

                    const typeInput = $(this).attr('type');

                    const value = $(this).val();

                    solicitanteInputsValues[id] = typeInput == "email" ? value.toLowerCase() : value
                        .toUpperCase();
                });


                const convenioInputsValues = {};

                $(".convenio").each(function() {

                    const id = $(this).attr('id');

                    const typeInput = $(this).attr('type');

                    const value = $(this).val();

                    convenioInputsValues[id] = typeInput == "email" ? value.toLowerCase() : value
                        .toUpperCase();
                });

                const controlInputsValues = $(".control_solicitante:checked").map(function() {
                    return $(this).val();
                }).get();

                const autorizacionValores = $(".autorizacion_solicitante:checked").map(function() {
                    return $(this).val();
                }).get();


                $.ajax({
                    url: '/solicitud/procesar',
                    type: "POST",
                    datatype: "json",
                    data: {
                        registro: registroInputsValues,
                        solicitante: solicitanteInputsValues,
                        convenio: convenioInputsValues,
                        control: controlInputsValues,
                        autorizacion: autorizacionValores
                    },
                    success: function(response) {

                        Swal.close();

                        if (parseInt(response.error) == 1) {

                            $(".validation").html("");

                            $("#div-control").css('background-color', '#faf9f7');

                            $("#div-autorizaciones").css('background-color', '#faf9f7');

                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 27000,
                                timerProgressBar: true,
                                backdrop: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#235B4E',
                            });

                            if (response.data !== null) {

                                const dataKeys = Object.keys(response.data);

                                for (
                                    let x = 0; x < dataKeys.length; x++
                                ) {

                                    if (
                                        dataKeys[x].match(/^[a-zA-Z0-9_]+\.[a-zA-Z0-9_]+$/)
                                    ) {
                                        let inputId = dataKeys[x].split(".");

                                        $(`#validation_${inputId[1]}`).html(response.data[
                                            dataKeys[x]].join(", "));

                                    }

                                }

                                if (
                                    dataKeys.includes("control")
                                ) {

                                    $("#div-control").css('background-color', '#ff6666');

                                }

                                if (
                                    dataKeys.includes("autorizacion")
                                ) {

                                    $("#div-autorizaciones").css('background-color', '#ff6666');

                                }
                            }

                        }

                        if (parseInt(response.error) == 0) {


                            Swal.fire({
                                icon: "success",
                                title: "¡Solicitud registrada con éxito!",
                                timerProgressBar: true,
                                confirmButtonText: 'Expedir solicitud en PDF',
                                confirmButtonColor: '#235B4E',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showCloseButton: false,
                            }).then((result) => {

                                if (result.isConfirmed) {

                                    limpiarFormulario(
                                        false
                                    );

                                    window.location.href =
                                        `/solicitud/descargar/${response.data.solicitud_uuid}`;

                                }
                            });


                        }
                    },
                    error: function(jqXHR, exception) {

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
                    let k = 0; k < registro.length; k++
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

                const controlValores = $(".control_solicitante:checked").map(function() {
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

                const autorizacionValores = $(".autorizacion_solicitante:checked").map(function() {
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
