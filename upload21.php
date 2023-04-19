<?php
//send to ayush
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productName = $_POST["productName"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $size = $_POST["size"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //echo "hi";  
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
        $productImage = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }
    //echo "hi";
    $query = "SELECT category_id FROM category WHERE category = '{$category}'";
    //echo "hi";
    $res = mysqli_query($conn,$query);
    //echo "hit";

    if(mysqli_num_rows($res)>0){
        $category_fetch = mysqli_fetch_assoc($res);
        $categoryId = $category_fetch['category_id'];
        //echo "$categoryId";
    }

    // $stmt = $conn->prepare("SELECT category_id FROM category WHERE category = '{$category}'");
    // echo "hi";
    // $stmt->bind_param("s", $category);
    // echo "hi";
    // $stmt->execute();
    // echo "hi";
    // $stmt->bind_result($categoryId);
    // echo "$categoryId";
    // $stmt->fetch();
    // $stmt->close(); // Close the previous statement
    

    if ($uploadOk) {
        //echo "$categoryId";
        // $stmt = $conn->prepare();
        // $stmt->bind_param($productName, $categoryId, $description, $price, $productImage,$username, $brand, $size);
        $query = mysqli_query($conn,"INSERT INTO `product`(`product_name`, `category_id`, `description`, `price`, `image_url`, `seller`, `brand`, `size`) VALUES ('$productName','$categoryId','$description','$price','$productImage','swapnil_jainn','$brand','$size')");
        if ($query) {
            echo "<div id='success-msg' class='alert alert-success'>Product Uploaded Succesfully</div>";
            ?>
                <script>
                    setTimeout(function() {
                        document.getElementById("success-msg").style.display = "none";
                    }, 3000); 
                </script>
            <?php
            //echo "Product uploaded successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        //$stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="custom.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <?php
        include 'navbar.php';
    ?>
</head>
<body>
<nav>
		<div>
			<a href="homepage.php" id="logo"><img src="img/logo.png" alt="logo" height="60"></a>
			<span id="tagline">Steals and Deals</span>
		</div>
		<div>
			<a href="#">About Us</a>
			<a href="#">Contact Us</a>
			<button id="login" onclick="gotologin()">Login/Register</button>
            <script>
                function gotologin(){
                    window.location.href = "login.php";
                }
            </script>
		</div>
	</nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">Upload Product Details</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="productName" class="form-label">Product Name:</label>
                                    <input type="text" name="productName" id="productName" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="brand" class="form-label">Brand:</label>
                                    <input type="text" name="brand" id="brand" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Category:</label>
                                    <select name="category" id="category" class="form-select" required>
                                        <option value="mens-clothing">Men's Clothing</option>
                                        <option value="womens-clothing">Women's Clothing</option>
                                        <option value="kids-clothing">Kids Clothing</option>
                                        <option value="mens-ethnic-wear">Men's Ethnic Wear</option>
                                        <option value="womens-ethnic-wear">Women's Ethnic Wear</option>
                                        <option value="festive-wear">Festive Wear</option>
                                        <option value="Accessories">Accessories</option>
                                        <option value="Shoes">Shoes</option>
                                        <!-- Add more categories here -->
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="size" class="form-label">Size:</label>
                                    <input type="text" name="size" id="size" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price:</label>
                                    <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="productImage" class="form-label">Product Image:</label>
                                    <input type="file" name="productImage" id="productImage" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>
                            <input type="submit" value="Upload Product" name="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


