<?php 
include 'database.php';

$brandFilter = $_GET['brand-filter'] ?? '';
$sizeFilter = $_GET['size-filter'] ?? '';
$priceFilter = $_GET['price-filter'] ?? '';

$where = '';
if ($brandFilter) {
  $where .= " WHERE brand = '$brandFilter'";
}
if ($sizeFilter) {
  $where .= $where ? " AND size = '$sizeFilter'" : " WHERE size = '$sizeFilter'";
}
if ($priceFilter) {
  $price = explode(',', $priceFilter);
  $minPrice = $price[0];
  $maxPrice = $price[1];
  $where .= $where ? " AND price BETWEEN $minPrice AND $maxPrice" : " WHERE price BETWEEN $minPrice AND $maxPrice";
}

$schoenen = $connection->query("SELECT * FROM schoenen $where");
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
  <script src="js/jquery.range.js"></script>
  <title>Schoenen</title>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <section>
    <aside>
      <h2 id="h2">Filters</h2> <br> <br>
      <form method="get">
        <label for="brand-filter">Schoenmerk:</label>
        <select id="brand-filter" name="brand-filter">
          <option value="">Alles</option>
          <option value="nike" <?php echo $brandFilter === 'nike' ? 'selected' : '' ?>>Nike</option>
          <option value="adidas" <?php echo $brandFilter === 'adidas' ? 'selected' : '' ?>>Adidas</option>
          <option value="puma" <?php echo $brandFilter === 'puma' ? 'selected' : '' ?>>Puma</option>
          <option value="oneill" <?php echo $brandFilter === 'oneill' ? 'selected' : '' ?>>O'Neill</option>
          <option value="reebok" <?php echo $brandFilter === 'reebok' ? 'selected' : '' ?>>Puma</option>
          <option value="asics" <?php echo $brandFilter === 'asics' ? 'selected' : '' ?>>Asics</option>
          <option value="fila" <?php echo $brandFilter === 'fila' ? 'selected' : '' ?>>Fila</option>
        </select>
        <br> <br>
        <label for="size-filter">Schoenmaat:</label>
        <select id="size-filter" name="size-filter">
          <option value="">All</option>
          <option value="5" <?php echo $sizeFilter === '5' ? 'selected' : '' ?>>37</option>
          <option value="6" <?php echo $sizeFilter === '6' ? 'selected' : '';





















































<?php 
include 'database.php';
$schoenen = $connection->query("SELECT * FROM schoenen");
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
<script src="js/jquery.range.js"></script>
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
		<option value="nike">Nike</option>
		<option value="adidas">Adidas</option>
		<option value="puma">Puma</option>
		<option value="oneill">O'Neill</option>
		<option value="reebok">Puma</option>
		<option value="asics">Asics</option>
		<option value="fila">Fila</option>
	</select>

<br> <br>
	<label for="size-filter">Schoenmaat:</label>
	<select id="size-filter">
		<option value="">All</option>
		<option value="5">37</option>
		<option value="6">38</option>
		<option value="7">39</option>
		<option value="8">40</option>
		<option value="9">41</option>
		<option value="10">42</option>
		<option value="11">43</option>
		<option value="12">44</option>
</select>

<br> <br>
	    <label for="price-filter">Price:</label>
			<input type="range" id="price" name="price" min="20" max="150">
			<span id="price-value"></span>
			<button id="filter-button">Filter</button>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="js/jquery.range.css">
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
<div class="search-panel">
    <p><input type="hidden" id="price_range" value="0,500"></p>
    <button onclick="filterProducts()" class="btn btn-outline-primary">Filter Products</button>
</div>

<div id="productContainer">
<?php 
    // Include database configuration file 
    include "database.php"; 
     
    // Fetch products from database 
    $query = $db->query("SELECT * FROM products WHERE status = 1 ORDER BY created DESC"); 
     
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
        ?>
        <div class="list-item">
            <h2><?php echo $row["name"]; ?></h2>
            <h4>Price: €<?php echo $row["price"]; ?></h4>
        </div>
<?php  
        } 
    }else{ 
        echo '<p>Product(s) not found...</p>'; 
    } 
    ?>
</div>
<script>
function filterProducts() {
    var price_range = $('#price_range').val();
    $.ajax({
        type: 'POST',
        url: 'fetchProducts.php',
        data:'price_range='+price_range,
        beforeSend: function () {
            $('.wrapper').css("opacity", ".5");
        },
        success: function (html) {
            $('#productContainer').html(html);
            $('.wrapper').css("opacity", "");
        }
    });
}
</script>
<?php 
if(isset($_POST['price_range'])){ 
     
    // Include database configuration file 
    include "database.php"; 
     
    // Set conditions for filter by price range 
    $whereSQL = ''; 
    $priceRange = $_POST['price_range']; 
    if(!empty($priceRange)){ 
        $priceRangeArr = explode(',', $priceRange); 
        $whereSQL = "WHERE price BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'"; 
        $orderSQL = " ORDER BY price ASC "; 
    }else{ 
        $orderSQL = " ORDER BY created DESC "; 
    } 
     
    // Fetch matched records from database 
    $query = $db->query("SELECT * FROM products $whereSQL $orderSQL"); 
     
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
    ?> 
        <div class="list-item"> 
            <h2><?php echo $row["name"]; ?></h2> 
            <h4>Price: €<?php echo $row["price"]; ?></h4> 
        </div> 
    <?php  
        } 
    }else{ 
        echo '<p>Product(s) not found...</p>'; 
    } 
} 
?>


</script>
<script src="script.js"></script>
</body>
</html>