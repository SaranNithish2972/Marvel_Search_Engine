<?php
require './submit1.php';
global $conn;
$name = $_POST['name'];
$location=$_POST['location'];
$date = date("Y-m-d H:i:s");
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $sql = "INSERT INTO history(id,searched,date,location)
VALUES ('$id', '$name','$date','$location')";
mysqli_query($conn, $sql);}
?>