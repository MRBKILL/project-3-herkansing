<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php
include 'navbar.php';

 echo "<h1>Delete Bier</h1>";
 require_once('functions.php');
 if(isset($_POST) && isset($_POST['btn_wzg'])){

 DeleteBier($_POST);
 header('Location: crud_bieren.php');
 }
 if(isset($_GET['id']))

 {

echo "Data uit het vorige formulier:<br>";

 $biercode = $_GET['id'];

 $row = GetBier($biercode);

}
?>

<html>
<body>
<form method="post">
Biercode:<input type="" name="id" value="<?php echo $row['id'];?>" readonly><br>
Naam:<input type="" name="merk" value="<?php echo $row['merk'];?>" readonly><br>
Soort: <input type="text" name="naam" value="<?= $row['naam']?>" readonly><br>
Stijl: <input type="text" name="beschrijving" value="<?= $row['beschrijving']?>" readonly><br>
Alcohol: <input type="text" name="prijs" value="<?= $row['prijs']?>" readonly><br>
Brouwcode: <input type="text" name="foto" value="<?= $row['foto']?>" readonly><br><br>


<input type="submit" name="btn_wzg" value="Delete"><br>

</form>
</body>
</html>