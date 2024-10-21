<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css ">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/admin_register.css">
    <title>Registrace Administrátora</title>
    
</head>
<body>
    <?php include "header.php" ?>

<div class="register-container">
    <h1>Registrace Administrátora</h1>
    <?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    if (isset($_GET['success'])) {
        echo "<p class='success'>Úspěšná registrace!</p>";
    }
    ?>
    <form action="admin_register_process.php" method="POST">
        <label for="first_name">Jméno:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Příjmení:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Heslo:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Registrovat">
    </form>
</div>
<?php include "footer.php" ?> 

</body>
</html>
