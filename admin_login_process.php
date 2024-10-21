<?php
session_start();

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
    echo "připojení-ON ";
}

// Zpracování dat po odeslání formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ochrana proti XSS
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; // Heslo není filtrováno, protože ho budeme porovnávat s hashovaným heslem

    // Kontrola, zda admin existuje v databázi
    $sql = "SELECT * FROM admin_users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Ověření hesla
            if (password_verify($password, $user['password'])) {
                // Nastavení session
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_name'] = $user['first_name'] . ' ' . $user['last_name'];

                // Přesměrování do admin sekce
                header("Location: admin_dashboard.php");
                exit;
            } else {
                echo "Nesprávné heslo.";
            }
        } else {
            echo "Tento uživatel neexistuje.";
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
