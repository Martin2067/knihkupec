<?php
// Načtení souboru pro připojení k databázi
include 'database.php';

// Kontrola, zda byl formulář odeslán
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání hodnot z formuláře
    $nazev = $_POST['nazev'];
    $autor = $_POST['autor'];
    $rok = $_POST['rok'];
    $popis = $_POST['popis'];

    // SQL dotaz pro vložení knihy do databáze
    $sql = "INSERT INTO knihy (nazev, autor, rok, popis) VALUES ('$nazev', '$autor', '$rok', '$popis')";

    // Kontrola, zda se vložení podařilo
    if ($conn->query($sql) === TRUE) {
        echo "Nová kniha byla úspěšně přidána.";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }

    // Zavření připojení
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css ">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/insert.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>

<?php include "header.php" ?>

<h1>Přidat novou knihu</h1>

<form action="insert.php" method="POST">
    <label for="nazev">Název knihy</label>
    <input type="text" id="nazev" name="nazev" required>

    <label for="autor">Autor</label>
    <input type="text" id="autor" name="autor" required>

    <label for="rok">Rok vydání</label>
    <input type="number" id="rok" name="rok" required min="1000" max="9999">

    <label for="popis">Popis knihy</label>
    <textarea id="popis" name="popis" rows="4"></textarea>

    <input type="submit" value="Přidat knihu">
</form>

<?php include "footer.php" ?>


</body>
</html>
