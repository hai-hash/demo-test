<?php
<?php

error_reporting(E_ALL); ini_set('display_errors', 1);
session_start(); // Starting Session
$error=''; // Variable To Store Error Message


if($_SERVER['REQUEST_METHOD'] == 'POST') {
if (empty($_POST['username']) || empty($_POST['password'])) {

$error = "Enter Username and Password";

 }

else
{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];


//connect to database
include('dbconx.php');


}

$stmt = $con->prepare("SELECT * from admin where password=? AND username=?");
$stmt->bind_param('ss', $username, $password); 
$stmt->execute();  
$stmt->bind_result($id, $username, $password);
$stmt->store_result();
     if($stmt->num_rows == 1)  //To check if the row exists
        {
 			
 			$_SESSION['login_user'] = $username; // Initializing Session
 			header("location: confirm.php"); // Redirecting To Other Page

 		}

 else {
 $error = "Username or Password is incorrect";
 }

 mysqli_close($con); // Closing Connection
 }

 ?>n check_login($user_name, $pass_word){
    
      
?>
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start(); // Starting Session
$error=''; // Variable To Store Error Message


if($_SERVER['REQUEST_METHOD'] == 'POST') {
if (empty($_POST['Username']) || empty($_POST['Password'])) {

$error = "Enter Username and Password";

 }

else
{
// Define $username and $password
$user_name = $_POST['Username'];
$pass_word = $_POST['Password'];
//connect to database


}
}

$stmt = $con->prepare("SELECT * from user where user_name=? AND pass_word=?");
    $stmt->bind_param('ss', $user_name, $pass_word); 
    $stmt->execute();  
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $stmt->bind_result($id, $username, $password);
         if($num_of_rows == 1)  //To check if the row exists
            {
                 
                 $_SESSION['login_user'] = $username; // Initializing Session
                 header("location: view.php"); // Redirecting To Other Page
    
             }
    
     else {
     $error = "Username or Password is incorrect";
     }
     print_r($error);

     $stmt->close();
     