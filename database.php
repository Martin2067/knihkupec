<?php

// Připojení k databázi
$servername = "localhost"; // Adresa serveru
$username = "martin";        // Uživatelské jméno databáze
$password = "dknihy";            // Heslo k databázi
$dbname = "knihkupec";         // Název databáze

// Vytvoření připojení
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení k databázi selhalo: " . $conn->connect_error);
} else {
    echo " DTB ON";
}




?>

