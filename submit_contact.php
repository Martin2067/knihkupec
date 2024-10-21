<?php

include "database.php";

$conn = dbConnect();

// Připojení k databázi
// $servername = "localhost"; // Adresa serveru
// $username = "martin";        // Uživatelské jméno databáze
// $password = "dknihy";            // Heslo k databázi
// $dbname = "knihkupec";         // Název databáze

// // Vytvoření připojení
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Kontrola připojení
// if ($conn->connect_error) {
//     die("Připojení k databázi selhalo: " . $conn->connect_error);
// } else {
//     echo "dtb-o";
// }

// Zpracování dat po odeslání formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ochrana proti XSS
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Vložení dat do databáze
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";

    // Připravení SQL dotazu
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Přiřazení hodnot do dotazu
        $stmt->bind_param("sss", $name, $email, $message);

        // Spuštění dotazu
        if ($stmt->execute()) {
            echo "Děkujeme, " . $name . "! Vaše zpráva byla úspěšně odeslána.";
        } else {
            echo "Chyba: " . $stmt->error;
        }

        // Uzavření příkazu
        $stmt->close();
    } else {
        echo "Chyba při přípravě dotazu: " . $conn->error;
    }
}

// Uzavření připojení k databázi
$conn->close();
?>

