<?php
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
      include "dbconnect.php";
      
      $username = $_POST["username"];
      $password = $_POST["password"];
      $cpassword = $_POST["cpassword"];
      $exists=false;
      if(($password == $cpassword)&&$exists==false){
      $sql = "INSERT INTO `users`(`username`, `password`, `dt`) VALUES ('$username','$password', current_timestamp())";
      $result = mysqli_query($conn,$sql);
      if ($result){
        $showAlert = true;
      }
      }
      else{
        $showError = "Password does not match";
      }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
if($showAlert){
echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> Your account is now created and you can login.
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
      <h1 class="text-center">Signup to our website</h1>
      <form action="../login/signup.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" id="cpassword">
    </div>
    <button type="submit" class="btn btn-primary">Sign up</button>
</form>

</div>
<?php include "../includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>