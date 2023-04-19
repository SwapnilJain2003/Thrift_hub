<?php
//send to ayush
if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost", "root", "", "thrift_hub");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT username, password, user_type FROM users WHERE username = '{$username}'";
    $res = mysqli_query($con, $sql);


    if (mysqli_num_rows($res) > 0) {
        $username_fetch = mysqli_fetch_assoc($res);
      
        $checkpass = $username_fetch['password'];  // getting password which is corresponding to that email
        $user_type = $username_fetch['user_type'];
        $pass_decode = password_verify($password, $checkpass);   //to check if my password is same with that encrypted password
        if ($pass_decode) {
            session_start();
            /* In the given PHP code, $_SESSION['user']=$email_fetch['username']; is used to create a session variable named "user" and assign it the value of the "username" field fetched from the database corresponding to the given email.

             This is done to store the information of the logged-in user in a session variable so that it can be accessed across multiple pages of the website. This variable can be used to personalize the user experience by displaying customized content and functionality based on the user's preferences and history.

             For example, if the user has previously selected a theme for the website, this information can be stored in the session variable and used to display the website in the selected theme every time the user logs in. */

            $_SESSION['user'] = $username;

            if ($user_type == 'seller') {
            ?>
                <script>
                    window.location.assign("upload21.php");
                </script>
                <?php
            } else {
            ?>
                <script>
                    window.location.assign("homepage.php");
                </script>
            <?php
            }   
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php
    include 'css.php';
    include 'navbar.php';
    ?>
</head>
<!-- The col-md-4 class specifies that the column should take up 4 columns of space out of a total of 12 columns on medium-sized devices and up. The offset-md-4 class adds a left margin to the column that is equivalent to 4 columns of space, effectively centering the column horizontally within its parent container. -->

<body>
    <nav>
		<div>
			<a href="homepage.php" id="logo"><img src="img/logo.png" alt="logo" height="60"></a>
			<span id="tagline">Steals and Deals</span>
		</div>
		<div>
			<a href="about.html">About Us</a>
			<a href="contactus.html">Contact Us</a>
			<button id="login" onclick="gotologin()">Login/Register</button>
            <script>
                function gotologin(){
                    window.location.href = "login.php";
                }
            </script>
		</div>
	</nav>

    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h1 class="text-center">Login to Thrift Hub</h1>
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
</body>

</html>