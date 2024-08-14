<?php
  require "config.php";

  function dbConnect(){
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
    if($mysqli->connect_errno != 0){
        return FALSE;
    }
    else{
        return $mysqli;
        
    }
  }


  function getCategories(){
    $mysqli =dbConnect();
    $result = $mysqli -> query("select distinct category from products_2");
    while($row= $result->fetch_assoc()){
        $categories[] = $row;
    }

    return $categories;
  }

  function getHomePageProducts($int) {
   
    $mysqli = dbConnect();
    $result = $mysqli->query("SELECT * FROM products_2 ORDER BY RAND() LIMIT $int");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

   

    return $data;
}

  function getProductsByCategory($category){
    $mysqli = dbConnect();

    $smtp = $mysqli->prepare("select * from products_2 where category = ?"); 
    $smtp->bind_param("s",$category);
    $smtp->execute();
    $result = $smtp->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    return $data;

  }

  function getProductByTitle($title){
    $mysqli = dbConnect();

    $smtp = $mysqli->prepare("select * from products_2 where title = ?");
    $smtp->bind_param("s",$title);
    $smtp->execute();
    $result = $smtp->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    return $data;
  }