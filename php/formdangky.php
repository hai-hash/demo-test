<?php

error_reporting(E_ALL); ini_set('display_errors', 1);
session_start(); // Starting Session
$error=''; // Variable To Store Error Message


if($_SERVER['REQUEST_METHOD'] == 'POST') {
if (empty($_POST['Username1']) || empty($_POST['Password1'])) {

$error = "Enter Username and Password";

 }

else
{
// Define $username and $password
$username1 = $_POST['Username1'];
$password1 = $_POST['Password1'];
$hashed = password_hash($password1, PASSWORD_BCRYPT);


//connect to database
$connect = new mysqli('localhost','root','123456','demo') or die ('ket noi that bai');


}
$query = "INSERT INTO user (code_tc, username,pass_word) VALUES (?, ?, ?)";
$code_tc ="user";

if($stmt = $connect->prepare($query)){
    $stmt->bind_param('sss',$code_tc,$username1,$hashed);
    $stmt->execute();
    }
    echo 'đăng ký thanh cong';
    
 $connect->close();
}
 ?>