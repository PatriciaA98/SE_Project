<?php
    include_once 'db_functions.php';
  // echo "before";
    if (isset($_REQUEST['Submit']))
    {
        //echo "hello world";
	    //if($_POST['firstName'] and $_POST['lastName'] and $_POST['email'] and $_POST['password'] and $_POST['con-Password'] and $_POST['card-number'] and $_POST['card-expiry'])
	    //{
            if($_POST['password'] != $_POST['con-password'])
            {
               echo "<script>alert('Passwords do not match'); window.location='signup.html'; </script>";
            }
            else if($_POST['password'] == $_POST['con-password'])
            {
                   //Assign Data from text box to a variable after filering it.
                    $fname = htmlentities(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    $lname = htmlentities(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    $password = htmlentities(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    $conPassword = htmlentities(filter_input(INPUT_POST, 'con-password', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    $cardNum = htmlentities(filter_input(INPUT_POST, 'card-number', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    $cardExp = htmlentities(filter_input(INPUT_POST, 'card-expiry', FILTER_SANITIZE_STRING), ENT_QUOTES);
                    
                    echo $fname. " ". $lname." ". $email. " ". $password. " ". $conpassword. " ".$cardNum." ".$cardExp."";

                    $db = new DB_functions();
                    $db->addUser($fname, $lname, $email, $password, $cardNum, $cardExp);
            }
            
           /* if ($password == $conPassword)
            {
                echo '<script>alert("Passwords must match")</script>';
            }*/
           // 
        //}


    }
    else if(isset($_REQUEST['unSubmit'])) //new code inserted here to remove user from that database
    {
        if($_POST['password'] != $_POST['con-password'])
        {
           echo "<script>alert('Passwords do not match');window.location='unsubscribe.html'; </script>";
        }
        else if($_POST['password'] == $_POST['con-password'])
        {
               //Assign Data from input fields to variables after filtering it 

              //$fname = htmlentities(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING), ENT_QUOTES);
             // $lname = htmlentities(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING), ENT_QUOTES);
             $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING), ENT_QUOTES);
             $password = htmlentities(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), ENT_QUOTES);
             $conPassword = htmlentities(filter_input(INPUT_POST, 'con-Password', FILTER_SANITIZE_STRING), ENT_QUOTES);

             //create a database object
             $db = new DB_functions();
             
             //remove user
             $db ->removeUser($email);
        }

           
    } 

    
?>