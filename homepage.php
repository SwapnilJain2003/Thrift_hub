<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="img\style.css">
    <link rel="stylesheet" type="text/css" href="img\nav.css">
    <title>Thrift Hub</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="img\Untitled-1.js"></script>
  </head>
  <body>
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
    
    <div class="carousel-content">
        
    </div>
    <div class="slideshow">
        <!-- carousel control buttons -->
        <button class="slide-btn slide-btn-1"></button>
        <button class="slide-btn slide-btn-2"></button>
        <button class="slide-btn slide-btn-3"></button>

        <div class="slideshow-wrapper">
            <div class="slide">
                <img class="slide-img"
                    src="img\1.png">
            </div>
            <div class="slide">
                <img class="slide-img"
                    src="img\2.png">
            </div>
            <div class="slide">
                <img class="slide-img" src="img\3.png">
            </div>
            
        </div>
    </div>

    

    <div class="category-container">
    <a href="category.php?category=6">
        <div class="category festive">
            <img src="img/festive.jpg" alt="Festive Wear">
            <h4>Festive Wear</h4>
        </div>
    </a>
    <a href="category.php?category=3">
        <div class="category kids">
            <img src="img/kids.jpg" alt="Kids Clothing">
            <h4>Kids Clothing</h4>
        </div>
    </a>
    <a href="category.php?category=1">
        <div class="category male">
            <img src="img/mens.jpg" alt="Mens Wear">
            <h4>Mens Wear</h4>
        </div>
    </a>
    <a href="category.php?category=2">
        <div class="category female">
            <img src="img/women.jpg" alt="Women's Wear">
            <h4>Women's Wear</h4>
        </div>
    </a>
    <br>
    <a href="category.php?category=8">
        <div class="category festive">
            <img src="img/shoes.jpg" alt="Shoes">
            <h4>Shoes</h4>
        </div>
    </a>
    <a href="category.php?category=7">
        <div class="category male">
            <img src="img/accessory.jpg" alt="Accessories">
            <h4>Accessories</h4>
        </div>
    </a>
    <a href="category.php?category=4">
        <div class="category winter-wear">
            <img src="img/ethnic male.jpg" alt="Winter Wear">
            <h4>Men's Ethnic Wear</h4>
        </div>
    </a>
    <a href="category.php?category=5">
        <div class="category female">
            <img src="img/women's ethnic.jpg" alt="Women's Wear">
            <h4>Women's Ethnic Wear</h4>
        </div>
    </a>
</div>

    <footer>
      <button class="top" onclick="topFunction()" id="back-to-top">^</button>
    </footer>
    <br>


    
  </body>
</html>