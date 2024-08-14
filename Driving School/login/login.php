<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
      include "dbconnect.php";
      
      $username = $_POST["username"];
      $password = $_POST["password"];
      
      
      
      $sql = "Select * from users where username='$username' AND password='$password'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows ($result);

      if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: admin.php");
      }
      
      else{
        $showError = "Invalid Credentials";
      }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav>
    <div class="brand">
        Our Store
    </div>

    <div class="links">
    <a data-active="index" href="loginsystem.php">Home</a>
        <a data-active="index" href="signup.php">Sign Up</a>
        <a data-active="about" href="login.php">Login</a>
        
    </div>
</nav>
<?php 
if($login){
echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are logged in now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
}
if($showError){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Success</strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  ';
}
?>
   
     
     <div class="container" my-4>
      <h1 class="text-center">Login to our website</h1>
      <form action="../login/login.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
         </div>
    <button type="submit" class="btn btn-primary">Log in</button>
</form>

</div>
<?php include "../includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>