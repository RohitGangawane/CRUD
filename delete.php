<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once'connection.php';  
if(isset($_GET['deleteid']))
{
    $sr = $_GET['deleteid']; 

    $sql ="DELETE FROM `Assignment_1` WHERE`Sr.No.`= $sr";  

    $result=mysqli_query($conn,$sql); 
    if($result){
       // echo"Deleted Successfully"; 
       header('location:index2.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>