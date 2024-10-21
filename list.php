<?php
// Načtení souboru pro připojení k databázi
include 'database.php';

// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení k databázi selhalo: " . $conn->connect_error);
} else {
    echo "dtb-on";
}




// SQL dotaz pro výběr všech knih
$sql = "SELECT nazev, autor, rok, popis FROM knihy";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Seznam knih</title>
    
</head>
<body>

<?php include "header.php" ?>

<h1>Seznam knih</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Název</th><th>Autor</th><th>Rok vydání</th><th>Popis</th></tr>";
    echo "</thead><tbody>";

    // Výpis dat z databáze do tabulky
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='Název'>" . $row["nazev"] . "</td>";
        echo "<td data-label='Autor'>" . $row["autor"] . "</td>";
        echo "<td data-label='Rok vydání'>" . $row["rok"] . "</td>";
        echo "<td data-label='Popis'>" . $row["popis"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Žádné knihy nebyly nalezeny.</p>";
}

// Zavření připojení
$conn->close();

include "footer.php"

?>



</body>
</html>
