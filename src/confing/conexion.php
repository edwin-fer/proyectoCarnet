<?php

class Conexion {
    protected $db;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'carnetizacion';
        $user = 'root';
        $pass = '';
        $driver = 'mysql'; // O 'pgsql' para PostgreSQL, por ejemplo

        try {
            $this->db = new PDO("{$driver}:host={$host};dbname={$dbname}", $user, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al tratar de conectarse a la base de datos: " . $e->getMessage();
            exit;
        }
    }

    public function getConexion() {
        return $this->db;
    }
}



?>



