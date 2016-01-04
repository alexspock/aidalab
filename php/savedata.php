<?php

//constants for DB connection
define('DB_HOST', 'localhost');
define('DB_NAME', 'test_task');
define('DB_USER','alex');
define('DB_PASSWORD','alex');

//establish connection and select db
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	if (isset($con) || isset($db)) {
		//echo "Connection ok!";
	}  
	else {
		echo "Connection is not established.";
	}

//fetching values from URL and processing them
$user2=trim(htmlspecialchars($_POST['user1']));
$firstname2=trim(htmlspecialchars($_POST['firstname1']));
$lastname2=trim(htmlspecialchars($_POST['lastname1']));
$email2=trim(htmlspecialchars($_POST['email1']));
$card_num2=trim(htmlspecialchars($_POST['card_num1']));
$cv2=trim(htmlspecialchars($_POST['cv2']));
$exp_date2=trim(htmlspecialchars($_POST['exp_date1']));
$card_hold_num2=trim(htmlspecialchars($_POST['card_hold_num1']));

//saving new user's info to the database
$query = mysql_query("UPDATE users set firstname='$firstname2', lastname='$lastname2', email='$email2', card_num='$card_num2', cv2='$cv2', exp_date='$exp_date2', card_hold_num='$card_hold_num2' where user='$user2';");
echo "Data Saved Succesfully";
mysql_close($con); 
?>