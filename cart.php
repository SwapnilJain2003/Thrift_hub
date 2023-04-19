<?php
session_start();
if (!isset($_SESSION['cart'])) {
  echo 'Your cart is empty.';
} else {
  $cart = $_SESSION['cart'];
  $product_ids = implode(',', $cart);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "thrift_hub";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM PRODUCT WHERE product_id IN ($product_ids)";
  $result = mysqli_query($conn, $sql);
  ?>
    <head>
    <link rel="stylesheet" type="text/css" href="img\style.css">
    <link rel="stylesheet" type="text/css" href="img\nav.css">
    <title>Thrift Hub</title>
    <script src="img\Untitled-1.js"></script>
  <style>
    table {
  border-collapse: collapse;
  border: 1px solid #ddd;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  font-size: 16px;
  font-family: Arial, sans-serif;
  margin: 20px auto;
}
.checkout
{
  width: 100px;
  text-align: center;
    background: #00bcd4;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
}


th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
  border: 1px solid #ddd;
}

td {
  border: 1px solid #ddd;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

    </style>
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


    <table style="align-content:center; text-align:center;">
  <tr>
    <th>Product Name</th>
    <th>Price</th>
  </tr>
  <?php 
    $total_price = 0;
    while ($row = mysqli_fetch_assoc($result)) { 
      $total_price += $row['price'];
  ?>
    <tr>
      <td><?php echo $row['product_name']; ?></td>
      <td><?php echo $row['price']; ?></td>
    </tr>
  <?php } ?>
  <tr>
    <td><strong>Total INR</strong></td>
    <td><strong><?php echo $total_price; ?></strong></td>
  </tr>
</table>
<center><a href="payment.html"><button class="checkout" type="submit">PROCEED</button></a></center>
  <?php
}
?>
 