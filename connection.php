<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass =  "";
$dbname = "Assignment"; 

 $conn = mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname); 
  if(!$conn){
    die("Database connection Failed!");
  } 


  ?> 