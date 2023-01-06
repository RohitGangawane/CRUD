<?php
require_once "connection.php";
if(isset($_POST['SUBMIT']))
{    
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$sql = "INSERT INTO users (name,mobile,email)
VALUES ('$name','$mobile','$email')";
if (mysqli_query($conn, $sql)) {
header("location: index.php");
exit();
} else {
echo "Error: " . $sql . "
" . mysqli_error($conn);
}
mysqli_close($conn);
}