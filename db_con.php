<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pharmacy";

$connection = new mysqli($servername, $dbusername, $dbpassword);
if ($connection->connect_error) {
	die("Server Not Responding!.." . $connection->connect_error);
}

$dbcreate = "CREATE DATABASE IF NOT EXISTS " . $dbname;
if ($connection->query($dbcreate) === TRUE) {
	$db_connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($db_connection->connect_error) {
		die("Unable to create the Database " . $db_connection->connect_error);
	}


	$admintable = "CREATE TABLE IF NOT EXISTS admin (ID int(11) AUTO_INCREMENT,
			fullname varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			username varchar(255) NOT NULL,
			password varchar(255) NOT NULL,
			PRIMARY KEY  (ID))";
	if ($db_connection->query($admintable) === FALSE) {
		echo $db_connection->error;
	} 
	

	$products = "CREATE TABLE IF NOT EXISTS products (ID int(11) AUTO_INCREMENT,
			drug varchar(255) NOT NULL,
			imported_from varchar(255) NOT NULL,
			category varchar(255) NOT NULL,
			quantity int(20) NOT NULL,
			price int(20) NOT NULL,
			date date NOT NULL,
			PRIMARY KEY  (ID))";
	if ($db_connection->query($products) === FALSE) {
		echo $db_connection->error;
	} 



	$billing = "CREATE TABLE IF NOT EXISTS bills (ID int(11) AUTO_INCREMENT,
			total_amount int(20) NOT NULL,
			month varchar(20) NOT NULL,
			year int(4) NOT NULL,
			sell_amt int(20),
			creation_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (ID))";
	if ($db_connection->query($billing) === FALSE) {
		echo $db_connection->error;
	} 
}
