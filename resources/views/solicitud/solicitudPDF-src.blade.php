<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud SISCORP</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url('https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxP.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: url('https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfBBc9.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            src: url('https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBBc9.ttf') format('truetype');
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 8px;
        }
    </style>
    <style>
        .page_break {
            page-break-before: always;
        }

        @page {
            margin: 40px 40px;
        }

        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
        }

        footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
        }

        main {
            position: relative;
            top: 0px;
            left: 0px;
            right: 0px;
        }
    </style>
    <style>
        .checkbox-x {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            background: #fff;
            font-size: 14px;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            vertical-align: middle;
            box-sizing: border-box;
        }

        .checkbox-x.checked {
            border-color: #000;
            background: #fff;
        }

        .checkbox-x.empty {
            border-color: #000;
            background: #fff;
        }
    </style>
</head>

<body>
    <header></header>
    <main>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 15%; background-color: #dc3545; border: 1px solid #000000;"></td>
                    <td style="width: 60%; font-weight: bold; text-align: center; border: 1px solid #000000;">
                        SOLICITUD ALTA USUARIO SISCORP
                    </td>
                    <td style="width: 25%; background-color: #dc3545; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 100%; background-color: #dc3545; border: 1px solid #000000; color: #ffffff; text-align: center; font-weight: bold;"
                        colspan="4">
                        DATOS DEL USUARIO
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 15%; font-weight: bold; text-align: left;">
                        NOMBRE:
                    </td>
                    <td style="width: 85%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['solicitante_nombre_completo'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 10%; font-weight: bold; text-align: left;">
                        CURP:
                    </td>
                    <td style="width: 40%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['solicitante_curp'] }}
                    </td>
                    <td style="width: 10%; font-weight: bold; text-align: right;">
                        FECHA:
                    </td>
                    <td style="width: 40%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['solicitante_fecha'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 35%; font-weight: bold; text-align: left;">
                        UNIDAD ADMINISTRATIVA:
                    </td>
                    <td style="width: 65%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['unidad_administrativa_nombre'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 55%; font-weight: bold; text-align: left;">
                        CARGO (DIRECTOR, SUBDIRECTOR, JUD, OTRO):
                    </td>
                    <td style="width: 45%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['cargo_nombre'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 10%; font-weight: bold; text-align: left;">
                        IP:
                    </td>
                    <td style="width: 30%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['solicitante_ip'] }}
                    </td>
                    <td style="width: 20%; font-weight: bold; text-align: right;">
                        WHATSAPP:
                    </td>
                    <td style="width: 40%; border-bottom: 1px solid #000000; text-align: center;">
                        {{ $solicitante['solicitante_telefono'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 30%; font-weight: bold; text-align: left;">
                        CORREO ELECTRÓNICO:
                    </td>
                    <td style="width: 70%; text-align: center;">
                        {{ $solicitante['solicitante_email'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 100%; background-color: #dc3545; border: 1px solid #000000; color: #ffffff; text-align: center; font-weight: bold;"
                        colspan="4">
                        TIPO DE CONTROL
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;" colspan="4">
                        MARQUE CON UNA (X) EL REQURIMIENTO
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; font-weight: bold;" colspan="4">
                        SELECCIONE EL TIPO DE CONTROL:
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td rowspan="2" style="vertical-align: top;">
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
                            <tbody>
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; border: 1px solid #000000; font-weight: bold;">
                                        PARTICULAR
                                    </td>
                                </tr>
                                @for ($i = 0; $i < count($control_solicitante['controles']['PARTICULAR']); $i++)
                                    <tr>
                                        <td style="text-align: left;">
                                            {{ $control_solicitante['controles']['PARTICULAR'][$i]['control_nombre'] }}
                                        </td>
                                        <td style="text-align: right;">
                                            <span
                                                class="checkbox-x {{ $control_solicitante['controles']['PARTICULAR'][$i]['control_check'] == 1 ? 'checked' : 'empty' }}">
                                                {{ $control_solicitante['controles']['PARTICULAR'][$i]['control_check'] == 1 ? 'X' : '' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
                            <tbody>
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; border: 1px solid #000000; font-weight: bold;">
                                        CARGA
                                    </td>
                                </tr>
                                @for ($j = 0; $j < count($control_solicitante['controles']['CARGA']); $j++)
                                    <tr>
                                        <td style="text-align: left;">
                                            {{ $control_solicitante['controles']['CARGA'][$j]['control_nombre'] }}
                                        </td>
                                        <td style="text-align: right;">
                                            <span
                                                class="checkbox-x {{ $control_solicitante['controles']['CARGA'][$j]['control_check'] == 1 ? 'checked' : 'empty' }}">
                                                {{ $control_solicitante['controles']['CARGA'][$j]['control_check'] == 1 ? 'X' : '' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
                            <tbody>
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; border: 1px solid #000000; font-weight: bold;">
                                        RUTA
                                    </td>
                                </tr>
                                @for ($k = 0; $k < count($control_solicitante['controles']['RUTA']); $k++)
                                    <tr>
                                        <td style="text-align: left;">
                                            {{ $control_solicitante['controles']['RUTA'][$k]['control_nombre'] }}
                                        </td>
                                        <td style="text-align: right;">
                                            <span
                                                class="checkbox-x {{ $control_solicitante['controles']['RUTA'][$k]['control_check'] == 1 ? 'checked' : 'empty' }}">
                                                {{ $control_solicitante['controles']['RUTA'][$k]['control_check'] == 1 ? 'X' : '' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
                            <tbody>
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; border: 1px solid #000000; font-weight: bold;">
                                        DEMOSTRADORA
                                    </td>
                                </tr>
                                @for ($x = 0; $x < count($control_solicitante['controles']['DEMOSTRADORA']); $x++)
                                    <tr>
                                        <td style="text-align: left;">
                                            {{ $control_solicitante['controles']['DEMOSTRADORA'][$x]['control_nombre'] }}
                                        </td>
                                        <td style="text-align: right;">
                                            <span
                                                class="checkbox-x {{ $control_solicitante['controles']['DEMOSTRADORA'][$x]['control_check'] == 1 ? 'checked' : 'empty' }}">
                                                {{ $control_solicitante['controles']['DEMOSTRADORA'][$x]['control_check'] == 1 ? 'X' : '' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
                            <tbody>
                                <tr>
                                    <td colspan="2"
                                        style="text-align: center; border: 1px solid #000000; font-weight: bold;">
                                        TAXI
                                    </td>
                                </tr>
                                @for ($y = 0; $y < count($control_solicitante['controles']['TAXI']); $y++)
                                    <tr>
                                        <td style="text-align: left;">
                                            {{ $control_solicitante['controles']['TAXI'][$y]['control_nombre'] }}
                                        </td>
                                        <td style="text-align: right;">
                                            <span
                                                class="checkbox-x {{ $control_solicitante['controles']['TAXI'][$y]['control_check'] == 1 ? 'checked' : 'empty' }}">
                                                {{ $control_solicitante['controles']['TAXI'][$y]['control_check'] == 1 ? 'X' : '' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="width: 100%; background-color: #dc3545; border: 1px solid #000000; color: #ffffff; text-align: center; font-weight: bold;"
                        colspan="4">
                        AUTORIZACIÓN
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
            <tbody>
                @for ($z = 0; $z < count($autorizacion_solicitante); $z++)
                    <tr>
                        <td style="text-align: left;">
                            {{ $autorizacion_solicitante[$z]['autorizacion_nombre'] }}
                        </td>
                        <td style="text-align: center;">
                            <span
                                class="checkbox-x {{ $autorizacion_solicitante[$z]['autorizacion_check'] == 1 ? 'checked' : 'empty' }}">
                                {{ $autorizacion_solicitante[$z]['autorizacion_check'] == 1 ? 'X' : '' }}
                            </span>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
            <tbody>
                <tr>
                    <td style="text-align: justify">
                        Todos los campos son obligatorios, el formato el formato se debe llenar a computadora o con letra de molde y 
                        leginle; la cuenta es personal y el usuariio será responsable del uso que se realice de la misma y podrá ser sancionado 
                        acorde a las leyes aplicables.
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
            <tbody>
                <tr>
                    <td style="border-bottom: 1px solid #000; height: 20px;"></td>
                    <td style="width: 15%;"></td>
                    <td style="border-bottom: 1px solid #000; height: 20px;"></td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        NOMBRE, FIRMA Y PUESTO DEL RESPONSABLE
                    </td>
                    <td></td>
                    <td style="text-align: center">
                        NOMBRE Y FIRMA DEL USUARIO FINAL
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000000;">
            <tbody>
                <tr>
                    <td style="font-weight: bold;"> Folio: 26062026_XXXXXXXXXXX</td>
                </tr>
            </tbody>
        </table>
    </main>
    <footer></footer>
</body>

</html>
