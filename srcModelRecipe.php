<?php
// src/Model/Recipe.php

class Recipe {
    private $conn;
    private $table = 'recepten';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Haal alle recepten op voor de overzichtspagina
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Haal één specifiek recept op voor de detailpagina
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}