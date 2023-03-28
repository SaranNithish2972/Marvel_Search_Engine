<?php
session_start();
 $conn = mysqli_connect("localhost", "root", "", "marvel");
	 $response = array('success' => false);

	 if(isset($_POST['email'])  && isset($_POST['password']) ){
	 $email=$_POST['email'];
	 $pass=$_POST['password'];
	
	 $user = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

	 if(mysqli_num_rows($user) > 0){
   
	   $row = mysqli_fetch_assoc($user);
   
	   if($pass == $row['password']){
		echo "Login Successful";
		 $_SESSION["login"] = true;
		 $_SESSION["id"] = $row["id"];
		 $response['success'] = true;
	   }}}

