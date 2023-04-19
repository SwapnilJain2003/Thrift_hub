<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "thrift_hub";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Get product ID from URL parameter
  $product_id = $_GET['product_id'];

  // Retrieve product information from database
  $sql = "SELECT * FROM product WHERE product_id = $product_id";
  $result = mysqli_query($conn, $sql);

  // Check if there is a product with the given ID
  
?>

<!DOCTYPE html>
<html>
  <head>
   <style>
.product-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 30px;
  width: 30%;
  margin-top:2%;
  background-color: #d8cbc4;
  border: 1px solid #d8cbc4;
  border-radius: 5px;
  padding: 20px;
  box-sizing: border-box;

}

.product-image {
  margin-left:5%;
  width: 400px;
  min-width: 400px;
}

.product-image img {
  max-width: 400px;
  height: 380px;
  display: block;
  margin: 0 auto;
}

.product-info {
  width: 60%;

  min-width: 200px;
  max-width:600px;
  margin-left: 30px;
}

.product-info h2 {
  font-size: 28px;
  margin: 0 0 10px;
}

.product-price {
  color: #8fa598;
  font-size: 24px;
  font-weight: bold;
  margin: 0 0 10px;
}

.product-description {
  width: 200%;
  max-width:900px;
  color: #808080;
  font-size: 18px;
  margin: 0 -100px 20px;
  text-align: center;
  line-height: 1.5;
}


.product-size{
  font-weight:bold;
}
.product-brand{
  font-weight:bold;
}

form {
  display: flex;
  align-items: center;
  width:295px;
}

label {
  font-size: 18px;
  margin-right: 10px;
}

input[type="number"] {
  width: 50px;
  font-size: 18px;
  padding: 5px;
  margin-right: 10px;
}

.btn-add-to-cart {
  display:flex;
  max-width:300px;
  padding: 10px 20px;
  font-size: 18px;
  color: #fff;
  background-color: #c7a58d;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-add-to-cart:hover {
  background-color: #aa8b75;
}


.collapsible {
  background-color: #c0aa9e;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .collapsible:hover {
  background-color: #d1bbb0;
}

.content {
  background-color:#a7806d;
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

.collapsible:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}



@media screen and (max-width: 768px) {
  .product-container {
    flex-direction: column;
    text-align: center;
  }

  .product-image {
    width: 100%;
    margin-bottom: 20px;
  }

  .product-info {
    width: 100%;
    
    margin-left: 0;
  }
}
</style>
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
                <a href="about.html">About Us</a>
                <a href="contactus.html">Contact Us</a>
                <a href="logout.php">Log Out</a>
              </div>
            </div>
        
    </nav>
  <?php
if (mysqli_num_rows($result) == 0) {
    echo "Product not found.";
  } else {
    $row = mysqli_fetch_assoc($result);
    $p_name = $row["product_name"];
    $price = $row["price"];
    $image = $row["image_url"];
    $description = $row["description"];
    $size = $row["size"];
    $seller = $row["seller"];
    $brand = $row["brand"];
    // Display product information

  }
  ?>


<div class="product-container">
  <div class="product-image">
    <img src="<?php echo $image ?>" alt="<?php echo $p_name ?>">
    
  </div>
  <div class="product-info">
    <h2><?php echo $p_name ?></h2>
    <p class="product-price">INR <?php echo $price ?></p>
    <p class="product-description"><?php echo $description?></p>
    <p class="product-size">Size: <?php echo $size?></p>
    <p class="product-brand">Brand: <?php echo $brand?></p>
    <form action="" method="post">
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">

      <button type="submit" class="btn-add-to-cart">Add to Cart</button>
    </form>
  </div>
</div>
    <br>
    <br>
    <br>

    <button type="button" class="collapsible">Returns</button>
<div class="content">
  <p>If you are unhappy with your order you are welcome to return it within<br>
    <br>

30 days from the purchase date.<br>
    <br>

How to return?<br>
    <br>

Customers can download a QR code and have their return label printed at drop off points around the city. 
<br>
    <br>
International customers please follow International Return Steps</p>
</div>

<button type="button" class="collapsible">Why Thrift Hub</button>
<div class="content">
  <p>We at Thrift Hub believe in circular fashion, moving away from the “buy, wear, chuck” mentality of high street fast fashion. We believe in clothing made from quality materials that lasts, that can have three, four owners in its lifetime.</p>
</div>

<button type="button" class="collapsible">Our Promise</button>
<div class="content">
  <p>All our website items are hand selected for their quality and style. We only select the best vintage items for www.thrifted.com, removing all torn or marked items from the system; any errors at all will be photographed and detailed in the description. We sell only true vintage pieces and original brands, no fakes ever.</p>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>
    <footer>
      <button class="top" onclick="topFunction()" id="back-to-top">^</button>
    </footer>
    <br>


    
  </body>
</html>