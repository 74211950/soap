<?php
// Configuración del servicio SOAP
$options = array(
    'uri' => 'http://localhost/',  // Cambia la URI según tu configuración
    'location' => 'http://localhost/servicio_soap.php'  // Cambia la ubicación según tu configuración
);

// Crear un objeto SoapServer
$server = new SoapServer(null, $options);

// Definir la clase y sus métodos
class ServicioSOAP {
    public function buscarDatos($parametro) {
        // Leer datos desde el archivo
        $archivo = 'datos.txt';
        $datos = file($archivo, FILE_IGNORE_NEW_LINES);

        // Buscar la información en el archivo
        $resultados = array();
        foreach ($datos as $dato) {
            list($fecha, $tipoClima) = explode(', ', $dato);
            if ($fecha == $parametro || $tipoClima == $parametro) {
                $resultados[] = "Fecha: $fecha, Clima: $tipoClima";
            }
        }

        // Retornar los resultados
        return $resultados;
    }
}

// Crear una instancia de la clase y agregarla al servicio SOAP
$server->setObject(new ServicioSOAP());

// Manejar la solicitud SOAP
$server->handle();
?>

