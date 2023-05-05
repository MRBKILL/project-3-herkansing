<?php 
session_start();
include 'database.php';
$where = '';
$currentBrand = '';
$var = array();
if (isset($_GET['brand']) && $_GET['brand'] != '') {
    $currentBrand = $_GET['brand'];
    $where = " WHERE merk LIKE ?";
    array_push($var, $currentBrand);
}

$statement = $connection->prepare("SELECT * FROM schoenen" . $where);
$statement->execute($var);
$schoenen = $statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
	<link rel="icon" href="img/schoenreus logo.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="js/jquery.range.css">
  <title>Schoenen</title>
</head>
<body>



<?php include 'navbar.php'; ?>
  <section>
		<aside>
			<h2 id="h2">Filters</h2> <br> <br>
			<label for="brand-filter">Schoenmerk:</label>
            <select id="brand-filter">
                <option value="">Alles</option>
                <?php
                    $merken = $connection->query("SELECT DISTINCT(merk) FROM schoenen WHERE merk NOT LIKE ''");
                    foreach ($merken as $merk) {
                        $merk = $merk['merk'];
                        $active = '';

                        if ($merk == $currentBrand) {
                            $active = 'selected';
                        }

                        echo '<option value="' . $merk . '" ' . $active . '>' . $merk . '</option>';
                    }
                ?>
            </select>

<br> <br>
	    <label for="price-filter">Price:</label>
			<input type="range" id="price" name="price" min="20" max="150">
			<span id="price-value"></span>
			
		</aside>
		
		<main class="producten_main">
			<div id= "shoe-list">
			<div class="products">
				<?php
					foreach($schoenen as $schoen)
					{
						echo '<div class="section_shoes">
						<a href="schoen.php?id=' . $schoen['id'] . '"><img src="' . $schoen['foto'] . '" class="producten"></a>
							<h3>' . $schoen['naam'] . '</h3>
							<p>'.$schoen['beschrijving'].'</p>
							<span>&euro;'.$schoen['prijs'].'</span>
						</div>';
					}
				?>
				
			</div>
			</div>
		</main>
	</section>
<?php include 'footer.php'; ?>


<link rel="stylesheet" href="js/jquery.range.css">


<div id="productContainer">
</div>
<script src="js/jquery-3.6.4.min.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.range.js"></script>
<script>
$(function(){
    $('#price_range').jRange({
        from: 0,
        to: 500,
        step: 50,
        format: '$%s USD',
        width: 300,
        showLabels: true,
        isRange : true
    });
});
</script>
</body>
</html>