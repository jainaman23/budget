<link rel="stylesheet" type="text/css" href="./signup.css">
<div id="signup">
<div class="budget"><h1>BUDGET</h1></div>
<div class="sign_up"><h2>SIGN UP</h2></div>	
<div class="form">	
<form action="signup.php" method="POST" enctype="multipart/form-data">
	<div class="int_title"><span class="title">Title:</span><select class="title_selc" name="title">
		<option value="Mr.">Mr.</option>
		<option value="Mrs.">Mrs.</option>
		<option value="Mrs.">Miss.</option>
		<option value="other">Other</option>
	</select>
	</div>
	<div class="int_name"> <span class="name">Name: </span> <input class="name_txt" type="text" name="name" placeholder="Name"></div>
	<div class="int_dob"><span class="dob">Date of birth:</span> <input class="dob_selc" type="date" name="dob"></div>
	<div class="int_emailid" ><span class="emailid">Email-id:</span> <input class="emailid_txt" type="text" name="emailid" placeholder="email id"></div>
	
	<div class="int_contact_number"><span class="contact_number">Contact No.:</span> <input class="contact_number_txt" type="text" name="contact_number" value=" " placeholder="Contact number"></div>
	
	<div class="int_address"><span class="address">Address:</span> <textarea class="address_txt" name="address" placeholder="Address"></textarea ></div>
	<div class="int_username"><span class="username">Username:</span> <input class="username_txt" type="text" name="username"  placeholder="Username"></div>
	<div class="int_password"><span class="password">Password:</span> <input class="password_txt" type="password" name="password"  placeholder="Password"></div>
	<div class="int_photo"><span class="photo">Photo:</span> <input class="photo_selc" type="file" name="photo" value=" "></div>
	<div class="int_submit"><input class="submit" type="submit" name="submit" value="submit"></div>
</form>
</div>
</div>


<?php 
	 //CREATE DATABASE AND TABLE.
  	$upload  = require_once("./database_table.php");
  	
  	// FIELD SHOULD NOT BE EMPTY !!
  	if(!empty($_POST["name"]) && !empty($_POST["dob"]) && !empty($_POST["emailid"]) && !empty($_POST["contact_number"]) && !empty($_POST["address"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && $_FILES['photo']['error'] == 0)
  	{


  	// FIELD VERIFICATION
  		//NAME
  		$_POST["name"]=addslashes($_POST["name"]);
  		//Emailid
  		$email_pattern = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
  		if(preg_match($email_pattern,$_POST['emailid']))
  		{
  		//CONTACT_NO
			$contact_digit = $_POST["contact_number"];
  		if(strlen($contact_digit) ==10)
  		{
  			$contact_pattern = "/^[7-9][0-9]{9}$/";
  		if(preg_match($contact_pattern,$_POST["contact_number"]))
  		{
		//USERNAME
			$_POST["username"]=addslashes($_POST["username"]);	


  	// PHOTO UPLOAD
  	$upload  = require_once("./upload.php");

	//INSERT FIELD VALUE IN DATABASE
	$db = new mysqli();
	$test = $db->connect("localhost","root","","budget");
	$value = "INSERT INTO `user_profile` SET 
		`Title`= '{$_POST["title"]}',
		`Name`='{$_POST["name"]}',
		`Date_of_birth`= '{$_POST["dob"]}',
		`Email_id` = '{$_POST["emailid"]}',
		`Contact_No` = '{$_POST["contact_number"]}',
		`Address`= '{$_POST["address"]}',
		`Username` = '{$_POST["username"]}',
		`Password` = '{$_POST["password"]}',
		`Photo` = '{$photo_source}'";
		$check = $db->query($value);
		var_dump($check);
		$db->close();

	
	
	}
	else
		{
			echo "Use only Numeric values";
		}

	}

	else
		{
			echo "Incorrect Contact No.";
		}
	
	}	
	else
		{
			echo "Incorrect email address";
		}

	}

	else
		{
			echo "Fill all details.";	
		}
	
 ?>