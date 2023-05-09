<?php
    include 'navbar.php';
    echo "<h1>Update Bier</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateBier($_POST);

        //header("location: update.php?$_POST[NR]");
    }

    if(isset($_GET['id'])){  
        echo "Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende biercode $_GET['biercode']
        $biercode = $_GET['id'];
        $row = GetBier($biercode);
    }
   ?>

<html>
    <body>
        <form method="post">
        <br>
        Biercode:<input type="" name="id" value="<?php echo $row['id'];?>"><br>
        Naam:<input type="" name="merk" value="<?php echo $row['merk'];?>"><br> 
        Soort: <input type="text" name="naam" value="<?= $row['naam']?>"><br>
        Stijl: <input type="text" name="beschrijving" value="<?= $row['beschrijving']?>"><br>
        Alcohol: <input type="text" name="prijs" value="<?= $row['prijs']?>"><br>
        Brouwcode: <input type="text" name="foto" value="<?= $row['foto']?>"><br><br>
        <input type="submit" name="btn_wzg" value="Wijzigen" onclick="window.location.href='crud_bieren.php'"><br>
        </form>
    </body>
</html>