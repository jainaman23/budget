<?php 

	// CREATE DATABASE SIGNUP
	$db = new mysqli();
	$db->connect("localhost","root","");
	$database = "CREATE DATABASE `budget`";
	$dat = $db->query($database);
	$db->close();


	// CREATE TABLE registration
	$db = new mysqli();
	$db->connect("localhost","root","","budget");
	$table = "CREATE TABLE  user_profile (
	Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	Title VARCHAR(5) ,
	Name VARCHAR(60) ,
	Date_of_birth VARCHAR(10) ,
	Email_id VARCHAR(50) ,
	Contact_No BIGINT(10) ,
	Address VARCHAR(200), 
	Username VARCHAR(60) ,
	Password VARCHAR(20) ,
	Photo VARCHAR(200)
	)";
	$tab = $db->query($table);
	$db->close();
	?>