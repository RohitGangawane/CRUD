<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once'connection.php';  

$sr = $_GET['updateid']; 

$sql="SELECT *FROM `Assignment_1` WHERE `Sr.No.`= $sr"; 

$result=mysqli_query($conn,$sql);  
$row=mysqli_fetch_assoc($result);
//print_r($row);
$name=$row['Name'];
$fname=$row['Father Name'];
$address=$row['address'];
$dob=$row['dob'];
$mob=$row['mob'];  




if(isset($_POST['submit']))
{  
   


  $name=$_POST['name'];
  $fname= $_POST['fname'];
  $address= $_POST['address'];
  $dob= $_POST['dob'];
  $mob=$_POST['mob']; 



  $sql="UPDATE `Assignment_1` SET `Name`='$name',`Father Name`='$fname',`address`='$address',`dob`='$dob',`mob`='$mob' WHERE `Sr.No.`='$sr'";  

  $result=mysqli_query($conn,$sql); 
  if($result){
   // echo "Data UPDATED Successfully"; 

   header('location:display.php');
  }else{
    die(mysqli_error($conn));
  }

}


?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body> 
 
   <div class="container my-5">  
      <form  method="post">
    <div class="form-group">

        <div class="form-outline"> 
            <label class="form-label" > Name</label>
            <input type="text" id="typeText" class="form-control" name="name" value=<?php  if(isset($_GET['updateid'])){echo $name;}?> />
           
          </div> 

          <div class="form-outline"> 
            <label class="form-label" for="typeText">Father Name</label>
            <input type="text" id="typeText" class="form-control" name="fname" value=<?php echo $fname?> />
           
          </div>
        <div class="form-outline"> 
            <label class="form-label" for="textAreaExample">Address</label>
            <input type="text" class="form-control" id="textAreaExample" rows="4" name="address" value=<?php echo $address?> /> 
            
          </div>  
          <div class="form-outline"> 
            <label class="form-label" for="typeText">Date Of Birth</label>
            <input type="date" id="typeText" class="form-control" name="dob" value="<?php echo $dob?>"/>
           
          </div>
  

    <div class="form-outline">
        <label class="form-label" for="typePhone">Phone number </label>
        <input type="tel" id="typePhone" class="form-control" name="mob" value=<?php echo $mob?> />
        
      </div>
    
      
       
    <button type="submit" class="btn btn-primary" name="submit">UPDATE</button> 
   
</form>
</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script> 


        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>

</html> 