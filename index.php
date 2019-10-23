<!DOCTYPE html>
<html>

<head>
  <title>Sign-Up/Login Form</title>
  <?php include 'css/css.html'; 
    	$host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'yukbauser';
      $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
      
      
      //setcookie('email', $_SESSION['email'], time()+60*60*24*365);
            

  
  ?>
  <nav>
    <ul>
      <li>
        <a href="new-1.php" id="nava">Home</a>
      </li>
      <li>
        <a href="login/profile.php" id="nava">Profile</a>
      </li>
      <li id="navli">
        <a href="about_us.html" id="nava">About</a>
      </li>

      <li id="profileli">Profile

		<ul id = "myul">
					<li id = "myli"><a href="/yukba/login/logout.php">Logout</a></li>
					<li id = "myli"><a href="/yukba/login/update.php">Update Profile</a></li>
					<li id = "myli"><a href="/yukba/login/changepassword.php">Change Password</a></li>
		</ul>
	
  </li>

    </ul>
  </nav>
</head>

<body background="back1.jpg">

<div class="form">
<a href="newuser.php">
<!-- <h2><?php echo $first_name; ?></h2> -->
<button  class ="button button-block">NEW ORDER</button>
</a>
<a href="viewdetails.php">
<button class ="button button-block">VIEW DETAILS</button>
</a>
<a href="retPage.php">
<button class ="button button-block" >SEARCH ORDER</button>
</a>
<a href="">
<button class ="button button-block" >SALES</button>
<a>
  
</div>
</body>

</html>