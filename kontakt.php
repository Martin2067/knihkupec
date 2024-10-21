<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css ">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/kontakt.css">
    
    <title>Kontakt</title>
</head>
<body>
    <?php include "header.php" ?>

    <!-- Kontakt sekce -->
<section class="contact-section">
    <h1>Kontaktujte nás</h1>
    <p>Máte dotaz nebo potřebujete pomoc? Vyplňte níže uvedený formulář a my se vám ozveme co nejdříve.</p>
</section>

<!-- Kontakt formulář -->
<div class="contact-form">
    <form action="submit_contact.php" method="POST">
        <input type="text" name="name" placeholder="Vaše jméno" required>
        <input type="email" name="email" placeholder="Váš email" required>
        <textarea name="message" rows="8" placeholder="Vaše zpráva" required></textarea>
        <button type="submit">Odeslat zprávu</button>
    </form>
</div>

<?php include 'footer.php'?>
    
</body>
</html>