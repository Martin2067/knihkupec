<?php
include "database.php";

session_start();

// Kontrola, zda je administrátor přihlášen
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

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
}

// Načtení zpráv z databáze
$sql = "SELECT id, name, email, message, created_at FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css ">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Admin Dashboard</title>
    
</head>
<body>
<?php include "header.php" ?>

<div class="dashboard-container">
    <h1>Kontaktní Zprávy</h1>

    <?php if ($result->num_rows > 0): ?>
        <table class="messages-table">
            <thead>
                <tr>
                    <th>Jméno</th>
                    <th>Email</th>
                    <th>Zpráva</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                        <td><?php echo date("d.m.Y H:i", strtotime($row['created_at'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Žádné zprávy nebyly nalezeny.</p>
    <?php endif; ?>

    <?php
    // Uzavření připojení k databázi
    $conn->close();
    ?>

    <a href="index.php" class="btn">Odhlásit se</a>
</div>

<?php include "footer.php" ?>


</body>
</html>

