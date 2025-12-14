<?php
// src/Model/Database.php

class Database {
    // Properties (variabelen)
    private $host = 'localhost';
    private $db_name = 'recepten_db'; 
    private $username = 'root'; 
    private $password = ''; // LET OP: Moet leeg blijven tenzij je een wachtwoord hebt ingesteld!
    private $conn;

    // Methode 1: Constructor (__construct)
    // Wordt automatisch uitgevoerd als je 'new Database()' typt. Maakt de connectie.
    public function __construct() {
        $this->conn = null;

        try {
            // Maak de verbinding met PDO (dit is veiliger dan mysqli)
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                  $this->username, 
                                  $this->password);
            
            // Stel de PDO error mode in op Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception) {
            echo "❌ Fout bij database verbinding: " . $exception->getMessage();
            die(); // Stop de applicatie als de DB niet werkt
        }
    }

    // Methode 2: getConnection
    // Geeft de actieve database verbinding terug aan de rest van de code.
    public function getConnection() {
        return $this->conn;
    }
}
?>