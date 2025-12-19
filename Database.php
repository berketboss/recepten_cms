<?php
// src/Model/Database.php

class Database {
    // Properties (variabelen)
    private $host = 'localhost';
    private $db_name = 'recepten_db'; 
    private $username = 'root'; 
    private $password = ''; 
    private $conn;

    // Methode 1: Constructor (__construct)
    public function __construct() {
        $this->conn = null;

        try {
            // Maak de verbinding met PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                 $this->username, 
                                 $this->password);
            
            // Stel de PDO error mode in op Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception) {
            echo "❌ Fout bij database verbinding: " . $exception->getMessage();
            // Voor een professionele site zou je dit later vervangen door een 'vriendelijke' foutpagina
            die(); 
        }
    }

    // Methode 2: getConnection
    public function getConnection() {
        return $this->conn;
    }
}
?>