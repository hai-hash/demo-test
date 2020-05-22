<?php
$password = "123456";
$password1="12345";
$hashed = password_hash($password, PASSWORD_BCRYPT);
$isValid = password_verify($password, $hashed);
echo $hashed;
echo '<br>';
echo $isValid;


?>