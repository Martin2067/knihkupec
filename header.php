<header>
    <nav>
        <div class="logo">Web s knihami</div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="insert.php">Vlož knihu</a></li>
            <li><a href="list.php">Knihy</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="admin_register.php">Registrace</a></li>
            <li><a href="admin_login.php">Admin</a></li> <!-- Odkaz na admin stránku -->
        </ul>
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul class="menu mobile">
            <li><a href="index.php">Home</a></li>
            <li><a href="insert.php">Vlož knihu</a></li>
            <li><a href="list.php">Knihy</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="admin_login.php">Admin</a></li> <!-- Odkaz na admin stránku -->
        </ul>
    </nav>
</header>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.menu.mobile');
        menu.classList.toggle('active');
    }
</script>