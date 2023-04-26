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