<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <?php include 'css/css.html'; ?> 
    <script>
        function goBack()
        {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="form">
        <h1>Error</h1>
        <p>
        <?php 
            if (isset($_SESSION['message']) AND !empty($_SESSION['message']))
            { 
                echo $_SESSION['message'];
            }
        ?>
        </p>
        <button class="button button-block" onclick="goBack();"/>Back</button>
        <a href="/yukba/login/index.php"><button class="button button-block"/>Home</button></a>
    </div>
</body>
</html>