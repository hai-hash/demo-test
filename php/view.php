<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
<title>Trang Chu</title>
    </head>
    <body>
        <h1 style="text-align: center; color: pink; ">trang chu</h1>
        <?php
        echo 'ten dang nhap cua ban la :'.'<br>';
        echo $_SESSION['login_user'];
        ?>

    </body>
    <footer>

    </footer>
</html>