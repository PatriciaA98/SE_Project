<?php
error_reporting(E_ALL);
ini_set('display_error','1');
class DB_Connect {
public function connect() {
	require_once 'config.php';
	//echo "before con";
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	//echo "after con";
	
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return null;
	}
	else
	{
		return $con;
	}

	function close() 
	{
		mysqli_close();
	}
}
}

$test = new DB_Connect();
$test->connect();

?>