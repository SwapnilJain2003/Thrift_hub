<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="img\style.css">
    <link rel="stylesheet" type="text/css" href="img\nav.css">
    <title>Thrift Hub</title>
    <script src="img\Untitled-1.js"></script>
  </head>
  <body bgcolor= "#d8cbc4">
  <nav>
        <div id="logo">
          <a href="homepage.php">
              <img src="img\logo.png" alt="Thrift Shopping logo" width="20%" height="20%">
          </a>
          <span id="tagline">Steals and Deals</span>
        </div>
  
        <form class="search-form" action="search.php" method="GET">
          <input type="text" name="query" placeholder="Search...">
          <button type="submit" ><img src="img\search-icon.png" alt="Search Icon" id="nav-search-button-img"></button>
        </form>
        <p style = "padding-right:30px; color:white;">Welcome $username</p>
        <div class="dropdown">
              <button class="dropbtn">More
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
              <a href="cart.php">Cart</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Log Out</a>
              </div>
            </div>
        
    </nav>

<div class="products">
<?php  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "thrift_hub";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = $_GET["query"];

$sql = "SELECT * FROM product WHERE product_name LIKE \"%$query%\"";
$result = mysqli_query($conn, $sql);


$num_rows = mysqli_num_rows($result);



for ($i = 0; $i < $num_rows; $i++){
  $row = mysqli_fetch_assoc($result);

$product_id = $row["product_id"];
$p_name = $row["product_name"];
$price = $row["price"];
$image = $row["image_url"];

?>



  <div class="product-item">
    <a href="product.php?product_id=<?php echo $row['product_id']; ?>">
      <img src="<?php echo $image?>" alt="Product">
      <h3> <?php echo $p_name?></h3>
      <p>INR <?php echo $price?></p>
      </a>
      <button id="add-to-cart" style="cursor: pointer;" onclick="addToCart(<?php echo $product_id; ?>)">Add to Cart</button>

    
  </div>
  <?php
}

?>

  </div>
    
  <script>
  function addToCart(productId) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'add_to_cart.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert('Item added to cart!');
    } else {
      alert('Failed to add item to cart.');
    }
  };
  xhr.send('product_id=' + productId);
}

  </script>
    

    <footer>
      <button class="top" onclick="topFunction()" id="back-to-top">^</button>
    </footer>
    <br>
    
  </body>
</html>