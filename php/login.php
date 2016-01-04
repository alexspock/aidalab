<?php
//including files with additional functions
if(file_exists('./forms.php')) include 'forms.php';
if(file_exists('./connect.php')) include 'connect.php';

//drawing main page with login results 
echo "
<html>
	<head> 
		<meta charset='utf-8'/>
		<link rel=\"stylesheet\" href=\"../css/style.css\">
		<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script>
		<script src=\"../js/script.js\"></script>
		<script src=\"../js/validation.js\"></script>
	</head>
	<body>
	"; 

//creating db connection
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());

//choosing db
auth($con);

//getting credentials entered by user  and saving them to array
$fields = array(
    'name' => htmlspecialchars($_POST['user']),
    'pass' => htmlspecialchars($_POST['pwd'])
);


echo '<div>';

//select query, checking if entered credentials are present in DB
$data = mysql_query("select * from users where user='$fields[name]' and password='$fields[pass]' ");

//processing query results, saving data from DB to array
while ($row = mysql_fetch_assoc($data)) {
	$user_info = array(
	1 => $row['user'],
	2 => $row['password'],
	3 => $row['firstname'],
	4 => $row['lastname'],
	5 => $row['email'],
	6 => $row['card_num'],
	7 => $row['cv2'],
	8 => $row['exp_date'],
	9 => $row['card_hold_num'],
	10 => $row['card_amount']
);
	
}

//if user name is empty - show appropriate message
if (!isset($user_info[1])) {
	die('Entered credentials are wrong.');
} 

//if user name is not empty - call function, which shows user's info from DB
else {
	draw_form($user_info);
}

echo "</div></body>";

//close DB connection
close_con($con);
?>