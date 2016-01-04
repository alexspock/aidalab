<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'test_task');
define('DB_USER','alex');
define('DB_PASSWORD','alex');

// function for selecting DB 
function auth($con){
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	if (isset($con) || isset($db)) {
		//echo "Connection ok!";
	}  
	else {
		echo "Connection is not established."	;
	}
}

// function for closing connection
function close_con($con) {
	mysql_close($con);
}

?>