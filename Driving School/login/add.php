<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  echo "error";
  die("Connection failed: " . $conn->connect_error);
}
else{
    echo '';
}
//if (isset($_POST['image']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['meta_description']) && isset($_POST['meta_keywords'])) 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $image = $_POST['image'];
    $title = $_POST['title'];
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];

    $sql = "INSERT INTO `products_2` (`image`, `title`, `price1`,`price2`, `description`, `category`, `meta_description`, `meta_keywords`) VALUES ('$image', '$title', '$price1', '$price2', '$description', '$category', '$meta_description', '$meta_keywords')";

    if ($conn->query($sql) === TRUE) {
        echo '<p>New record created successfully  </p><a href="/Driving%20School/login/admin.php">Add New</a>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo '<p>One or more required fields are missing.</p><a href="/Driving%20School/login/admin.php">Retry !</a>';
}

$conn->close();
?>
