<?php

 echo "<h1>Delete Bier</h1>";
 require_once('functions.php');
 if(isset($_POST) && isset($_POST['btn_wzg'])){

 DeleteBier($_POST);
 header('Location: crud_bieren.php');
 }
 if(isset($_GET['biercode']))

 {

echo "Data uit het vorige formulier:<br>";

 $biercode = $_GET['biercode'];

 $row = GetBier($biercode);

}
?>

<html>
<body>
<form method="post">
Id:<input type="text" name="biercode" value="<?php echo $row['naam'];?>" readonly><br>
Merk: <input type="text" name="soort" value="<?= $row['soort']?>" readonly><br>
Naam:<input type="text" name="naam" value="<?php echo $row['naam'];?>" readonly><br>
Beschrijving: <input type="text" name="stijl" value="<?= $row['stijl']?>" readonly><br>
Prijs: <input type="text" name="alcohol" value="<?= $row['alcohol']?>" readonly><br>
Foto: <input type="text" name="brouwcode" value="<?= $row['brouwcode']?>" readonly><br><br>


<input type="submit" name="btn_wzg" value="Delete"><br>

</form>
</body>
</html>