<?php

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
$username = $_POST['Username'];
$password = $_POST['Password'];


//connect to database
$connect = new mysqli('localhost','root','123456','demo') or die ('ket noi that bai');


}
$query1 = 'SELECT * FROM user WHERE pass_word=? AND username=?';
//$id = 1;

if($stmt = $connect->prepare($query1)){
    /*
         Binds variables to prepared statement
 
         i    corresponding variable has type integer
         d    corresponding variable has type double
         s    corresponding variable has type string
         b    corresponding variable is a blob and will be sent in packets
    */
    $stmt->bind_param('ss',$password,$username);
 
    /* execute query */
    $stmt->execute();
 
    /* Store the result (to get properties) */
    $stmt->store_result();
 
    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
 
    /* Bind the result to variables */
    //$stmt->bind_result($id,$code,$user_name1,$pass_word1);
    $stmt->bind_result($id,$code,$user_name1,$pass_word1);

 
    if($num_of_rows != 0)  //To check if the row exists
        {
 			
 			$_SESSION['login_user'] = $user_name1; // Initializing Session
           //  header("location: view.php"); // Redirecting To Other Page
           echo $user_name1;
           echo $username;
           

         }
    else{
        die("tài khoản hoặc mật khẩu sai");
    }
 
    /* free results */
    $stmt->free_result();
 
    /* close statement */
    $stmt->close();
 }
 
 /* close connection */
 $connect->close();
}
 ?>