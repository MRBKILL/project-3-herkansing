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
    include "dbConfig.php"; 
     
    // Fetch products from database 
    $query = $db->query("SELECT * FROM products WHERE status = 1 ORDER BY created DESC"); 
     
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
        ?>
        <div class="list-item">
            <h2><?php echo $row["name"]; ?></h2>
            <h4>Price: $<?php echo $row["price"]; ?></h4>
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
    include "dbConfig.php"; 
     
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
            <h4>Price: $<?php echo $row["price"]; ?></h4> 
        </div> 
    <?php  
        } 
    }else{ 
        echo '<p>Product(s) not found...</p>'; 
    } 
} 
?>
