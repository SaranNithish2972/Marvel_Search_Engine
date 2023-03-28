<?php
$host ="localhost";
$username="root";
$password="";
try{
    $conn=new PDO("mysql:host=$host;dbname=marvel",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed: ".$e->getMessage();}
$response = array('success' => false);

if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['password']) )
{
	$conn1 = mysqli_connect("localhost", "root", "", "marvel");
	$user = mysqli_query($conn1, "SELECT * FROM user WHERE email = '".addslashes($_POST['email'])."'");
	if(mysqli_num_rows($user) > 0){
		echo json_encode($response);
		exit;
	  }
	$sql = "INSERT INTO user(name,email,password) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['email'])."', '".addslashes($_POST['password'])."')";
	
	if($conn->query($sql))
	{
		$response['success'] = true;
	}
}
echo json_encode($response);
