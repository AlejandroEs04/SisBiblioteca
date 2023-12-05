<?php 

use Dompdf\Dompdf;

define('TEMPLATES_URL', __DIR__ . '/modules');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');

function incluirTemplate( string $nombre, $info ) {
    foreach($info as $key => $value) {
        $$key = $value;
    }

    $_POST["info"] = $info;

    include TEMPLATES_URL . "/${nombre}.php";
}

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function mostrarNotificacion($resultado) {
    $mensaje = '';

    switch($resultado) { 
        case 1:
            $mensaje = 'Creado Correctamente';
        break;

        case 2:
            $mensaje = 'Actualizado Correctamente';
        break;

        case 3:
            $mensaje = 'Eliminado Correctamente';
        break;

        default:
            $mensaje = false;
        break;
    }

    return $mensaje;
}

function crearTicket($negocio, $prestamoView) {

    $dompdf = new Dompdf();
    $path = '/build/img/logo.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    // Estilos CSS para el ticket
    $styles = '
    <style>
        /* Estilos para el ticket */
        .ticket {
            width: 450px;
            border: 2px solid #4CAF50;
            padding: 20px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        /* ... Otros estilos ... */
    </style>
    ';

    // HTML completo con estilos y datos dinámicos
    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Ticket de Préstamo</title>
        '.$styles.' <!-- Estilos CSS -->
    </head>
    <body>
        <div class="ticket">
            <div class="info">
                <p><strong>Biblioteca:</strong> ' . $negocio[0]->nombre . '</p>
                <p><strong>Dirección:</strong> ' . $negocio[0]->calleNumero .' '. $negocio[0]->colonia . ' ' . $negocio[0]->codigoPostal . '</p>
                <p><strong>Correo:</strong> ' . $negocio[0]->correo . '</p>
                <p><strong>Número de Teléfono:</strong> ' . $negocio[0]->numero . '</p>
                <p><strong>Nombre del cliente:</strong> ' . $prestamoView->nombreCliente . '</p>
            </div>
            <hr>
            <h3>Libros Prestados:</h3>
            <table styles={
                display: "flex",
                flexDirection: "column",
                gap: "2px"
            } >
                <tr>
                    <th>Libro</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                </tr>';

        foreach($prestamoView->libros as $libro){
            $html .= '<tr>
                        <td>'.$libro->nombre.'</td>
                        <td>'.$libro->fechaInicio.'</td>
                        <td>'.$libro->fechaFin.'</td>
                    </tr>';
        }


    $html .= '</table>
                <div class="footer">
                    <p>¡Gracias por utilizar nuestros servicios!</p>
                </div>
            </div>
        </body>
        </html>';

    // Cargar el HTML en Dompdf
    $dompdf->loadHtml($html);

    // Establecer el tamaño y orientación del papel
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar el documento
    $dompdf->render();

    // Generar el PDF (mostrarlo en el navegador o guardar en un archivo)
    $dompdf->stream("ticket_prestamo.pdf", array("Attachment" => true));

    header('Location: /');
}