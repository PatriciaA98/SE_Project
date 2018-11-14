<?php
error_reporting(E_ALL);
ini_set('display_error','1');
class DB_Functions {
	private $db;
	private $con;
	//private $sess = array();

	//Constructor
	function __construct(){
		include_once 'db_connect.php';
		$this->db = new DB_Connect();
		$this->con = $this->db->connect();
	}
	
	public function addUser($fname, $lname, $email, $password, $cardNum, $cardExp)
	{
		/*Insert Code will go here*/
	
		$sql = "INSERT INTO customer(`firstName`, `lastName`, `email`, `password`, `cardNumber`, `cardExpire`)
				 VALUES ('".$fname."','".$lname."','".$email."','".SHA1('$password')."', '".$cardNum."','".$cardExp."' )";

				echo $sql;
		
		/*$sql2 = "INSERT INTO payment_information (card_number, expire_date )
				 VALUES ('$cardNum','$cardExp')";*/

		$result = mysqli_query($this->con,$sql);
		
		 if (($result == true))
		  {
			echo"<script>alert('Signup Successful');window.location='index.html'; </script>";
		  }
		  else{
			  echo"<script>alert('Error!!');</script>";
		  }
	}//add user

     //delete function function inserted

	public function removeUser($email)
	{
		 $sql = "DELETE FROM customer WHERE email ='". $email."'";
		 
		 $result = mysqli_query($this -> con, $sql);

		 if (($result == true))
		 {
		   echo"<script>alert('Delete Successful');window.location='index.html'; </script>";
		 }
		 else{
			 echo"<script>alert('Error!!');</script>";
		 }
		 

	}//removeuser










}//end class

	



