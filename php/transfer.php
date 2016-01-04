<?php

//using mysqli API for establishing connection AND proceeding with transfer TRANSACTION
$dbConnection = mysqli_connect('localhost', 'alex', 'alex', 'test_task');

//disabling autocommit for transaction
mysqli_autocommit($dbConnection, false);

//transaction flag
$flag = true;

//validating sender, recipient and transfer amount values
if (isset($_GET['recipients'])){
	$recipient=trim(htmlspecialchars($_GET['recipients']));
}

else{
	echo "No recipient selected!";
	$flag = false;
}

if (isset($_GET['sender'])){
	$sender =trim(htmlspecialchars($_GET['sender']));
}

else {
	echo "No sender found!";
	$flag = false;
}

if (isset($_GET['transfer_amount'])){
	$transfer_amount =trim(htmlspecialchars($_GET['transfer_amount']));
}

else {
	echo "No transfer found!";
	$flag = false;
}

// query variables for selecting current card amounts of sender and recipient
$query0 = ("SELECT card_amount from users where user='$sender';");
$query1 = ("SELECT card_amount from users where user='$recipient';");

//first query execution and its result processing
$result = mysqli_query($dbConnection, $query0);
$result->data_seek(0);

if (!$result) {
   $flag = false;
   echo "Error details: " . mysqli_error($dbConnection) . ".";
}

while ($row = $result->fetch_assoc()) {
    //echo " result = " . $row['card_amount'] . "\n";
	$current_amount_s = $row['card_amount'];
}

//calculating new card amount of sender
$new_amount_sender = (float)$current_amount_s - (float)$transfer_amount;

//validating whether new amount of sender became negative
if ($new_amount_sender<0){
	$flag=false;
}

//second query execution and its result processing
$result = mysqli_query($dbConnection, $query1);
$result->data_seek(0);

while ($row2 = $result->fetch_assoc()) {
    //echo " result = " . $row2['card_amount'] . "\n";
	$current_amount_r = $row2['card_amount'];
}

if (!$result) {
   $flag = false;
   echo "Error details: " . mysqli_error($dbConnection) . ".";
}

//calculating new card amount of recipient
$new_amount_recipient = (float)$current_amount_r  +  (float)$transfer_amount;

//query variables for updating card amounts of sender and recipient
$query2 = ("UPDATE users set card_amount='$new_amount_sender' where user='$sender';");
$query3 = ("UPDATE users set card_amount='$new_amount_recipient' where user='$recipient';");

//third query execution and its result processing
$result = mysqli_query($dbConnection, $query2);
if (!$result) {
	$flag = false;
	echo "Error details: " . mysqli_error($dbConnection) . ".";
}

//fourth query execution and its result processing
$result = mysqli_query($dbConnection, $query3);
if (!$result) {
	$flag = false;
	echo "Error details: " . mysqli_error($dbConnection) . ".";
}

//if all previous checkings were true - commit transaction
if ($flag) {
	mysqli_commit($dbConnection);
	
	//creating div with successful results
	echo "
	<div id=\"transfer_res\">
	<p>
	The transfer was executed successfully.
	</p>
	</div>
	";
} 

//if some of checkings returned false - rollback transaction
else {
	mysqli_rollback($dbConnection);
	
	//creating div with unsuccessful results
	echo "
	<div id=\"transfer_res\">
	<p>
	The transfer was failed.
	</p>
	</div>
	";
} 

//closing connection
mysqli_close($dbConnection);
?>