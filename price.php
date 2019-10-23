<html>

<head>

<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">

<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
<nav>
<ul  >
  <li id="navli"><a href="new-1.html" id="nava">Home</a></li>
	<li id="navli"><a href="viewdetails.php" id="nava">View Details</a></li>
	<li id="navli"><a href="retPage.php" id="nava">Search Order</a></li>
	<li id="navli"><a href="changestat.php" id="nava">Delivery Status</a></li>
	<li id="navli"><a href="price.php" id="nava">Sales</a></li>	  </ul>
<br>
<br>
<br>

</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	

.button {

    background-color: green; 

    border: none;

    
    

    padding: 50px 25px;

    text-align: center;

    text-decoration: none;

    display: inline-block;

    font-size: 16px;

    margin: 30px 70px;

    -webkit-transition-duration: 0.4s; /* Safari */

    transition-duration: 0.4s;

    cursor: pointer;

	   margin-right :0px;
	   margin-left:10px;
    position: relative;


    top: 100px;

}

.button {

    background-color: white; 

    padding:100px 20px;

    color: black; 

    border: white;

	font-size: 25px;

	border: 2px solid #ee6e73;

	border-radius:10px;
	height:30%;
	width:11.5%;
	vertical-align:middle;
  

}





.button:hover {

    background-color: #26a69a ; 

    color: black;

    font: white;

}




	.abcd{
			padding-top: 10%;
			margin: 0px;
			width: 75%;
			color: black;
			font-size: 20px
		}
		body{
			background-image: url("wall1.jpg");
		}
		input{
			width: 25%;
		}
		span{
			color: black;
			font-size: 20px;
		}
		
body {font-family: Verdana, sans-serif; 

	

    padding: 0px;

	border: 0px;

	margin: 0px;

	height: 750px;

	background-size: 100% 100%;
background-color: #bdbdbd;
background-image: url("wall1.jpg");}
</style> 

</head>

<body>


<center>


<br>





<button class="button button" onclick="window.location.href='dasal.php' "><i class="fa fa-user"></i><div class="s3"> Daily Sales</div></button>

 

  <button class="button button" onclick="window.location.href='darev.php' "><i class="fa fa-scissors"></i> <div class="s3">Daily In Hand Revenue</div></button>

  <button class="button button" onclick="window.location.href='mosal.php' "><i class="fa fa-scissors"></i> <div class="s3">Monthly Sales</div></button>
  
  <button class="button button" onclick="window.location.href='yrsal.php' "><i class="fa fa-scissors"></i> <div class="s3" id="sales">Yearly Sales </div></button>



</center>
</body>

</html>











