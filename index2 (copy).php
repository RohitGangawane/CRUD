<?php 
//INSERT
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once 'connection.php';  
  print_r($_POST); 
  print_r($_GET);
if(isset($_POST['submit']) )
{
  $name=$_POST['name'];
  $fname= $_POST['fname'];
  $address= $_POST['address'];
  $dob= $_POST['dob'];
  $mob=$_POST['mob']; 
  if(empty($name)|| empty($fname)|| empty($address)||empty($dob)||empty( $mob)){ 
    header('Location: '.$_SERVER['PHP_SELF'].'?message=all fields are necessary'); 
  
  } else{
    $sql="INSERT INTO `Assignment_1` (`Sr.No.`, `Name`, `Father Name`, `address`, `dob`, `mob`) VALUES (NULL, '$name', ' $fname', '$address', '$dob', '$mob')";  
    $result=mysqli_query($conn,$sql); 
    if($result){
      echo "Data Added Successfully"; 
  
     header('location:index2.php');
    }else{
      die(mysqli_error($conn));
    }
  

  }

} else if (isset($_GET['updateid'])){ 
   
  // UPDATE 

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

}


else if(isset($_POST['submit']) && isset($_GET['updateid'])  )
{  
   


  $name=$_POST['name'];
  $fname= $_POST['fname'];
  $address= $_POST['address'];
  $dob= $_POST['dob'];
  $mob=$_POST['mob']; 



  $sql= "UPDATE `Assignment_1` SET `Name`='$name',`Father Name`='$fname',`address`='$address',`dob`='$dob',`mob`='$mob' WHERE `Sr.No.`='$sr'";  

  $result=mysqli_query($conn,$sql); 
  if($result){
   // echo "Data UPDATED Successfully"; 

   header('location:index2.php');
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
   <link rel="stylesheet" href="style.css">
</head>

<body> 
   
  <div class="container"> 

 <!-- Image and text -->
<nav class="p-3 mb-2 bg-secondary text-white">
  <a class="navbar-brand" href="#">
    <img src="https://c0.wallpaperflare.com/preview/510/115/623/application-request-work-looking-for-a-job.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
    Assignment_1 Form 
  </a>
</nav>

  </div>


<div class="row"> 
  <div class="col">
  <!-- <div class="col-md-7">   -->
    
     <div class="container my-5">  
      
     <span class="border"> 

     <form  method="post" id="frm"  class="was-validated">
    <div class="form-group">

        <div class="form-outline"> 
            <label class="form-label" >Name</label>
            <input type="text" id="typeText" class="form-control" name="name" value = "<?php  if(isset($_GET['updateid'])){echo $name;}?>"  required/>
            <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
           
          </div>  


          <div class="form-outline"> 
            <label class="form-label" for="typeText">Father Name</label>
            <input type="text" id="typeText" class="form-control" name="fname" value = "<?php  if(isset($_GET['updateid'])){echo $fname;}?>" required />
            <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
           
          </div>

          <div class="form-outline"> 
            <label class="form-label" for="textAreaExample">Address</label>
            <input type="text" class="form-control" id="textAreaExample" rows="4" name="address"  value="<?php  if(isset($_GET['updateid'])){echo $address;}?>" required  /> 
            <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
            
          </div>  
     


      <div class="form-outline"> 
            <label class="form-label" for="typeText">Date Of Birth</label>
            <input type="date" id="typeText" class="form-control" name="dob"  value= "<?php  if(isset($_GET['updateid'])){echo $dob;}?>"  required/> 
            <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
           
          </div> 


          <div class="form-outline">
        <label class="form-label" for="typePhone">Phone number </label>
        <input type="tel" id="typePhone" class="form-control" name="mob" value="<?php  if(isset($_GET['updateid'])){echo $mob;}?>" required minlength="10"  maxlength="10"/>
        <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
        
      </div>
       
      <input type="submit" class="btn btn-primary" name= "submit" id="submit"> </input> 

 <?php 
 if(isset($_GET['message'])){
  echo "<p>" .$_GET['message']."</p>";
}
 
 ?> 
</form>
</div>  

     </span>
  
     
<!-- </div> -->
</div>
</div>
  <div class="col">
    <div class="container" id="form">  
   
   <div class="row">
     <div class="col-md-5">
       <button type="button" class="btn btn-outline-primary"><a href="index2.php">ADD INFO </button></a> 
   
   <table class="table">
     <thead>
       <tr>
         <th scope="col">Sr.No.</th>
         <th scope="col">Name</th>
         <th scope="col">Father Name</th>
         <th scope="col">Address</th> 
         <th scope="col">D.O.B</th>  
         <th scope="col">Mob No.</th>  
         
         
       </tr>
     </thead>
     <tbody> 
   
     <?php 
     $sql="SELECT * FROM `Assignment_1`";
     $result=mysqli_query($conn,$sql); 
     if($result){
      while( $row=mysqli_fetch_assoc($result)) {
   
       $sr=$row['Sr.No.'];
       $name=$row['Name'];
       $fname=$row['Father Name'];
       $address=$row['address'];
       $dob=$row['dob'];
       $mob=$row['mob'];
      echo '
      <tr>
      <th scope="row">'.$sr.'</th>
      <td>'.$name.'</td>
      <td>'.$fname.'</td>
      <td>'. $address.'</td>
      <td>'. $dob.'</td>
      <td>'.$mob.'</td> 
      <td> 
   
    
      <button type="button" class="btn btn-outline-primary"><a href="index2.php?updateid='.$sr.' ">UPDATE</button></a>  
      

      
      <button type="button" class="btn btn-danger"><a href="delete.php?deleteid='.$sr.'" class="text-light"">DELETE</button></a>
      </td> 
      
   
    </tr>
      
      ';
      }
       
     }
   
     ?>
     
   </table>
   
   
   </div>
   
   
   </div> 
   </div> 
   
   
   
   </div>
  
</div>





 






  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> 
        <script> 
      
</script>
</body>

</html>