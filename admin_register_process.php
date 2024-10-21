<?php
// Připojení k databázi
$servername = "localhost";
$username = "martin";
$password = "dknihy";
$dbname = "knihkupec";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení k databázi selhalo: " . $conn->connect_error);
}

// Získání dat z formuláře
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// Validace vstupů
if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
    header("Location: admin_register.php?error=Vyplňte všechna pole.");
    exit;
}

// Kontrola, zda email již existuje
$sql = "SELECT id FROM admin_users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Pokud email již existuje, vrátí chybu
    header("Location: admin_register.php?error=Email již existuje.");
    exit;
}

$stmt->close();

// Hashování hesla
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Vložení administrátora do databáze
$sql = "INSERT INTO admin_users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

if ($stmt->execute()) {
    // Přesměrování po úspěšné registraci
    header("Location: admin_register.php?success=1");
} else {
    // Chyba při vkládání do databáze
    header("Location: admin_register.php?error=Nepodařilo se vytvořit uživatele.");
}

$stmt->close();
$conn->close();
?>
