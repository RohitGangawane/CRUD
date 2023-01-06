<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once'connection.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Assignment_1</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>  
 


<div class="container my-5">    


<!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  UPDATE
  </button>

<!-- Modal -->

  
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

   <button type="button" class="btn btn-outline-primary"><a href="delete.php?deleteid='.$sr.'">DELETE</button></a>
   </td> 
   

 </tr>
   
   ';
   }
    
  }

  ?>
  
</table>


</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script> 

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

 <script> 

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>    

</body>
</html> 