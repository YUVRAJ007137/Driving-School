<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
    echo 'Connection successful';
}

// Set a default value for $title
$title = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $Name = $_POST['Name'];
    $Pno = $_POST['Pno'];
    $title = $_POST['title'];
    $package = $_POST['package'];
    
    // Check if all required fields are set
    if (!empty($Name) && !empty($Pno) && !empty($title) && !empty($package)) {
        // Prepare SQL query
        $sql = "INSERT INTO `customers`(`Name`, `Pno`, `dt`, `DS name` , `Package`) VALUES (?, ?, current_timestamp(), ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("siss", $Name, $Pno, $title, $package);
            
            // Execute SQL query
            if ($stmt->execute()) {
                echo '<p>New record created successfully</p><a href="/Driving%20School/login/admin.php">Add New</a>';
                $stmt->close();
                $conn->close();
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo '<p>One or more required fields are missing.</p><a href="/Driving%20School/login/admin.php">Retry!</a>';
    }
}

$conn->close();
?>
