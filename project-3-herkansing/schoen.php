<?php 
include 'database.php';
$stmt = $connection->prepare('SELECT * FROM schoenen WHERE id = :id');
$stmt->execute([ 'id' => $_GET['id'] ]);
$schoen = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="img/schoenreus logo.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schoen 1</title>
</head>
<body>
  <?php include 'navbar.php' ?>
  <div class="schoenfoto">
  <img src="<?php echo $schoen['foto']; ?>" alt="" srcset="">
  </div>
  <div class="schoenalles">
  <div class="schoentekst">
    <h2><?php echo $schoen['naam']; ?></h2>
    <p id="schoenprijs"><?php echo $schoen['prijs']; ?> </p>
    <p><?php echo $schoen['beschrijving']; ?></p>
  </div>
  <br>
  <div class="schoenmaten">
    <button>37</button>
    <button>38</button>
    <button>39</button>
    <button>40</button>
    <button>41</button>
    <br>
    <button>42</button>
    <button>43</button>
    <button>44</button>
  </div>
  <br>
  <br>
  <div class="schoenkopenenwinkelwagen">
    <button id="schoenkoopnu">Koop nu</button>
    <a href="winkelwagen.php"><button><img src="img/winkelwagenicoon2.png" alt="" srcset=""></button></a>
  </div>
  </div>
  <?php include 'footer.php' ?>
</body>
</html>