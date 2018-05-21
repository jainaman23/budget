<?php 

// empty check
if(!$_POST['firstname'] || !$_POST['lastname'] || !$_POST['email'] || !$_POST['password']){
	echo "Please fill all details <a href='../registration/signup.html'> Return</a> ";
}
else{
	// remove special character
	$firstname = addslashes($_POST['firstname']);
	$lastname = addslashes($_POST['lastname']);
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);
	
	// unique email validation
	$show = "SELECT * FROM `signup` WHERE `email` ='{$email}'";
	$db = new mysqli();
	$db->connect("localhost","root","","registration");
	$result = $db->query($show);
	if($result->num_rows==1){
		echo "Email-id already exist <a href='../registration/signup.html'> Return</a>" ;}
		
		else{
		// Insert into database
		$add = "INSERT INTO `signup` SET `firstname`= '{$firstname}', `lastname`= '{$lastname}', `email` = '{$email}', `password`= '{$password}'";

		$db->connect("localhost","root","","registration");
		$result = $db->query($add);
		$db->close();
		echo "Record Updated </br> Want to add another record  <a href='../registration/signup.html'> Return</a> ";
		}
	}

	
 ?>