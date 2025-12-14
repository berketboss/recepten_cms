<?php
// public/index.php - Nu de code aanpassen om de database te testen

// 1. Laad de Database Class (deze moet in de Model map staan)
require_once('../src/Model/Database.php'); 

// 2. Gebruik de Class (Object Georiënteerd Programmeren)
$database = new Database(); // <-- Maakt een nieuw Database object aan (Constructor wordt uitgevoerd)
$db = $database->getConnection(); // <-- Haalt de PDO-verbinding op

if ($db) {
    echo "<h1>✅ Database Verbinding Gelukt!</h1>";
    
    // Controle: We proberen nu data op te vragen uit de 'categories' tabel
    try {
        $query = "SELECT COUNT(*) FROM categories";
        $stmt = $db->query($query);
        
        if ($stmt) {
            echo "<p>Controle geslaagd: Kon de 'categories' tabel lezen.</p>";
            echo "<p>Dit betekent dat de database en de code correct zijn gekoppeld.</p>";
        }
    } catch (Exception $e) {
        echo "<p>❌ De tabellen zijn aangemaakt, maar er is een fout bij het lezen: " . $e->getMessage() . "</p>";
    }

} else {
    echo "<h1>❌ Database Verbinding Mislukt.</h1>";
}
?>cd C:\xampp\htdocs\recepten_cms
