<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - <?php $_SESSION['username']?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav>
    <div class="brand">
    Admin - <?php echo $_SESSION['username']?>
    </div>

    <div class="links">
       
        <a data-active="about" href="logout.php">Logout</a>
        
    </div>
</nav>
 
   <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Admin</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<br>
<div class="container mb-4">
<h2>Add</h2>
<form action="../login/add.php" method="POST">
<div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input type="text" class="form-control" id="exampleFormControlInput1"name="image" placeholder="image.jpg">
</div>
<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="title">
</div>
<div class="mb-3">
  <label for="price1" class="form-label">Price</label>
  <input type="number" class="form-control" id="exampleFormControlInput1" name="price1" placeholder="price">
</div>
<div class="mb-3">
  <label for="price2" class="form-label">Price</label>
  <input type="number" class="form-control" id="exampleFormControlInput1" name="price2" placeholder="price">
</div>
<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="description" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="category" class="form-label">City</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="category" placeholder="City">
</div>
<div class="mb-3">
  <label for="meta_description" class="form-label">Meta Description</label>
  <input type="text" class="form-control" id="exampleFormControlInput1"name="meta_description" placeholder="meta description">
</div>
<div class="mb-3">
  <label for="meta_keywords" class="form-label">Meta Keywords</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="meta_keywords" placeholder="meta keywords">
</div>
<button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
<?php include "../includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>