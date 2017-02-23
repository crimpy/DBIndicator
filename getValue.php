<?php

require("config/config.php");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if (!$conn) { 
    die(' Could not connect: ' . mysqli_error()); 
  }

     $q = "SELECT count(ID) as `count` from table where criteria=0;";

  if(!$result = $conn->query($q)){
      die('There was an error running the query ['.$conn->error.']');
  }
     
    mysqli_query($conn,$q) or die(mysqli_error($conn));

$rows = $result->num_rows;
$row = $result->fetch_assoc();
echo $row['count'];

?>