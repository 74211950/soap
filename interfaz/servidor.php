<?php
class DataService {
    private $file_path = "datos.txt";

    public function guardarDatos($nombre, $dni, $edad) {
        $data = "$nombre, $dni, $edad\n";
        file_put_contents($this->file_path, $data, FILE_APPEND);
        return "Datos guardados correctamente";
    }

    public function obtenerTodosLosDatos() {
        $data = file_get_contents($this->file_path);
        return $data;
    }
}

$options = array('uri' => 'http://localhost/server.php'); // Cambia esto según tu entorno

$server = new SoapServer(null, $options);
$server->setClass('DataService');
$server->handle();
?>