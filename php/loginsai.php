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

$query = "SELECT * FROM user WHERE pass_word = '".$password."'"." AND username = '".$username."'";
//$query = "SELECT * FROM user WHERE pass_word = '".$password."'";
$result = mysqli_query($connect,$query);
if (!$result){
    die ('Câu truy vấn bị sai');
}
$row = mysqli_num_rows($result);
if($row != 0){
    $_SESSION['login_user'] = $username; // Initializing Session
 	header("location: view.php"); // Redirecting To Other Page
}
else{
    die("sai thông tin đăng nhập");
}
mysqli_free_result($result);
 $connect->close();
}
?>
