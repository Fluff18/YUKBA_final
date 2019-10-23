<!DOCTYPE html>
<html>
<head>
	<?php include 'css/css.html'; ?>
	<title>View</title>
	<nav>
	<ul id="navul">
		<li id="navli"><a href="new-1.php" id="nava">Home</a></li>
		<li><a href="login/profile.php" id="nava">Profile</a></li>
		<li id="navli"><a href="viewdetails.php" id="nava">View Details</a></li>
		<li id="navli"><a href="retPage.php" id="nava">Search Order</a></li>
		<li id="navli"><a href="changestat.php" id="nava">Delivery Status</a></li>
		<li id="navli"><a href="price.php" id="nava">Sales</a></li>
		<li id="profileli"><a href="login/profile.php" id="nava">Profile</a>

		<ul id = "myul">
					<li id = "myli"><a href="/yukba/login/logout.php">Logout</a></li>
					<li id = "myli"><a href="/yukba/login/update.php">Update Profile</a></li>
					<li id = "myli"><a href="/yukba/login/changepassword.php">Change Password</a></li>
		</ul>
	
	</li>
	</ul>
	</nav>
</head>

<body>
<div class="form">
    <h1>View Details</h1>
	<form action="viewdet.php" method="POST" target="myframe">
		<div class="field-wrap">
			<label>Order Number : </label>
			<input type="number" class="validate" name="o1" min="1"> 
		</div>
		<input  type="submit" class="btn waves-effect waves-light" name="submit" value="SUBMIT">
		
	</form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="index.js"></script>


<iframe name="myframe" style="height:1000px; width:100%" >
</iframe>
</body>
</html>