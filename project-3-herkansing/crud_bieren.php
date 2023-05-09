<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section class="crud-page">
        <?php
        // functie: programma overzicht bieren
        include 'navbar.php';
        include 'functions.php';
// connect database bieren
        ConnectDb();
// print bieren
        CrudBieren();

        ?>
</section>
    </body>
</html>