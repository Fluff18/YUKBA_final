<?php
    session_start();
    setcookie('email', $_SESSION['email'], time()-1000,'/');
    session_unset();
    session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <?php include 'css/css.html'; ?>
</head>
<body>
    <div class="form">
        <?php 
            setcookie('email', $_POST['email'], 1);
            setcookie('password', password_hash($_POST['password'], PASSWORD_BCRYPT), 1);
          	header("location: /yukba/login/index.php");
        ?>
    </div>
</body>
</html>