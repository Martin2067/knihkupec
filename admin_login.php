<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_login.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css ">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    li
    <title>Admin Přihlášení</title>
    
</head>
<body>

<?php include "header.php" ?>

<!-- Admin login sekce -->
<section class="admin-login-section">
    <h1>Admin Přihlášení</h1>
    <p>Prosím, přihlaste se pomocí svých administrátorských údajů.</p>
</section>

<!-- Formulář pro přihlášení -->
<div class="admin-login-form">
    <form action="admin_login_process.php" method="POST">
        <input type="text" name="first_name" placeholder="Jméno" required>
        <input type="text" name="last_name" placeholder="Příjmení" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Heslo" required>
        <button type="submit">Přihlásit se</button>
    </form>
</div>

<?php include 'footer.php'; // Include footer ?>
</body>
</html>
