<!DOCTYPE html>
<html>
  <head>

    <link rel="stylesheet" type="text/css" href="img\style.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="img\nav.css">
    
    <title>Login</title>
    <script src="img\Untitled-1.js"></script>
    <?php
      include 'css.php';
    ?>
  </head>
  <body bgcolor= "#d8cbc4">
    <nav>
      <div id="logo">
        <a href="homepage.html">
            <img src="img\logo.png" alt="Thrift Shopping logo" width="20%" height="20%">
        </a>
        <span id="tagline">Steals and Deals</span>
      </div>

      <form class="search-form">
        <input type="text" placeholder="Search...">
        <datalist id="items">
            <option value="Shirts"></option>
            <option value="Pants"></option>
            <option value="Skirts"></option>
            <option value="JumpSuits"></option>
            <option value="Kurtis"></option>
            <option value="Shorts"></option>
            <option value="T Shirts"></option>
            <option value="Blazers"></option>
          </datalist>
        <button type="submit" ><img src="img\search-icon.png" alt="Search Icon" id="nav-search-button-img"></button>
      </form>
      <div class="dropdown">
            <button class="dropbtn">More
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">About Us</a>
              <a href="#">Contact Us</a>
            </div>
          </div>
      <div id="login-signup">
            <a  href="login.html">
                <button class="login-button">Login / Signup</button>
            </a>
        </div>
  </nav>



  <?php
//send to ayush
if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost", "root", "", "thrift_hub");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $res = mysqli_query($con, $sql);


    if (mysqli_num_rows($res) > 0) {
        $username_fetch = mysqli_fetch_assoc($res);
      
        $checkpass = $username_fetch['password'];   // getting password which is corresponding to that email
       
        $pass_decode = password_verify($password, $checkpass);   //to check if my password is same with that encrypted password
        if ($pass_decode) {
            session_start();
            /* In the given PHP code, $_SESSION['user']=$email_fetch['username']; is used to create a session variable named "user" and assign it the value of the "username" field fetched from the database corresponding to the given email.

             This is done to store the information of the logged-in user in a session variable so that it can be accessed across multiple pages of the website. This variable can be used to personalize the user experience by displaying customized content and functionality based on the user's preferences and history.

             For example, if the user has previously selected a theme for the website, this information can be stored in the session variable and used to display the website in the selected theme every time the user logs in. */

            $_SESSION['user'] = $username;
         ?>
            <script>
                window.location.assign("index.php");
            </script>
       <?php
        } else {
            echo "<div id='invpass' class='alert alert-danger'>Invalid Password</div>";
            ?>
            <script>
               setTimeout(function() {
              document.getElementById("invpass").style.display = "none";
              }, 3000); 
             </script>
            <?php
        }
    } else {
        echo "<div id='invemail'class='alert alert-danger'>Invalid Username</div>";
        ?>
        <script>
           setTimeout(function() {
          document.getElementById("invemail").style.display = "none";
          }, 3000); 
         </script>
        <?php
    }
}

?>

        <div id="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <h1 class="text-center">Login</h1>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group my-4">
                            <input type="submit" name="submit" class="form-control btn btn-success" value="Login">
                        </div>
                        <div class="form-group ">
                        <p>Don't Have an Account? <a href="register.php">Create an account</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
      
  <footer>
      <button class="top" onclick="topFunction()" id="back-to-top">^</button>
    </footer>
    <br>


    
  </body>
</html>