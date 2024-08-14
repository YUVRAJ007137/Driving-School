<?php 
require "php/functions.php";

if (isset($_GET['title'])) {
    $title = urldecode($_GET['title']);
    $product = getProductByTitle($title);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $product[0]['meta_description']?>">
    <meta name="keywords" content="<?php echo $product[0]['meta_keywords']?>">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        footer{
            position: fixed;
            bottom: 0;
        }
 
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
     <?php include "includes/nav.php" ?>
     <?php include "includes/header.php" ?>


    <main>
        <div class="left">
            <div class="section-title" >Select City
            </div>
        
            <?php $categories= getCategories() ?>
            <?php
              foreach($categories as $category){

                ?>

                <a href="category.php?category=<?php echo urlencode($category['category'])?>">
                
                <?php echo ucfirst($category['category'])?></a>

                <?php

              }

              ?>
          
        </div>

        <div class="right">
            <div class="section-title">Driving School details
            </div>
        

            <div class="product">

           
                 <div class="product-left">
                    <img src="<?php echo "products/{$product[0]['image']}" ?>" alt="">
                </div>
                <div class="product-right">
                    <p class="title">
     
                        <?php echo "{$product[0]['title']}" ?></a>
                    </p>
                    <p class="description">
                    <?php echo "{$product[0]['description']}" ?>
                    </p>

                   <p class="price">
                   <?php echo "{$product[0]['price1']}" ?>
                   </p>
                </div>
           
              
                
            </div>
            
   

<br>
                <div class="info">
                    <h1>Packages</h1>
                    <div class="le">
                    <div class="packs">
                        <h1>
                            With licence
                        </h1>
                       <h2>
                        Total fees:  <?php echo "{$product[0]['price1']}" ?>
                       </h2>
                      
                    </div>
                  
                    <div class="packs">
                        <h1>
                            Without licence
                        </h1>
                        <h2>
                            Total fees: <?php echo "{$product[0]['price2']}" ?>
                        </h2>
                    </div>
                </div>
                </div>

              <h1>Book your seat for free</h1>
              <form action="../DRIVING SCHOOL/php/admission.php" method="POST" id="admissionForm">

<input type="hidden" name="title" value="<?php echo htmlspecialchars($product[0]['title']); ?>">

<div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="Name" placeholder="Name" required>
</div>
<div class="mb-3">
    <label for="Pno" class="form-label">Pno</label>
    <input type="text" class="form-control" id="exampleFormControlInput2" name="Pno" placeholder="Phone number" required>
    <br>
    
   <select name="package">
   <option value="Without License">Without License</option>
    <option value="With License">With License</option>
    
  </select>

</div>

<button type="submit" class="btn btn-primary" id="submitButton" disabled>Book My seat</button>
<br><br><br>
</form>
</div>
               
    </main>

    
    <?php include "includes/footer.php" ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src = "javascript/script.js"></script>
    <script>
    // Function to check if all required fields are filled
    function checkForm() {
        var name = document.getElementById("exampleFormControlInput1").value;
        var phone = document.getElementById("exampleFormControlInput2").value;
        
        // Enable the submit button if all required fields are filled
        if (name !== "" && phone !== "" ) {
            document.getElementById("submitButton").disabled = false;
        } else {
            document.getElementById("submitButton").disabled = true;
        }
    }

    // Add event listeners to input fields to trigger the checkForm function
    document.getElementById("exampleFormControlInput1").addEventListener("input", checkForm);
    document.getElementById("exampleFormControlInput2").addEventListener("input", checkForm);
   
    
</script>

</body>
</html>