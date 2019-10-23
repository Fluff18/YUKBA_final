
<html>
<head>
	<?php include 'css/css.html'; ?>
<title>Change Order Status</title>
<nav>
<ul id="navul">
	<li id="navli"><a href="new-1.php" id="nava">Home</a></li>
	<li id="navli"><a href="viewdetails.php" id="nava">Track Order</a></li>
	<li id="navli"><a href="retPage.php" id="nava">View Details</a></li>
	<li id="navli"><a href="changestat.php" id="nava">Delivery Status</a></li>
	<li id="navli"><a href="price.php" id="nava">Sales</a></li>
</ul>
</nav>
</head>
<body>

<div class = "form">
	<h1>Change Status</h1>
		
		<form name="chnstat" action="change_status.php" method="POST" >
		<div class="field-wrap">
			<label class ="active highlight">Order No:</label>
			<input type="number" id="ono" name="c_order_no">

			<script type="text/javascript">
				document.getElementById("ono").value = localStorage.getItem("orderNo");
				document.cookie="orderno="+localStorage.getItem("orderNo");
			</script>
		</div>
		<div class="field-wrap" style="text-align: center">
		<span>
			<input name="group1" type="radio" value="inprogress" checked />
		IN PROGRESS
		</span>
		<span>
			<input name="group1" type="radio" value="notstarted" />
			NOT STARTED
		</span>
		<span>
			<input  name="group1" type="radio"  value="packed"/>
			PACKED
		</span>
		<span>
		<input name="group1" type="radio" value="delivered" />
		DELIVERED</span>
		</div>
  		<input type="submit" value="Change Status" class="btn waves-effect waves-light" name="changestat" >
		</form>	

</div>
<div class="form">
	<h1>Update Order Delivery Details</h1>
		<form name="updstat" action="update_status.php" method="POST" >
		<div class="field-wrap">		
			<label class ="active highlight">Order No:</label>
				<input type="number" name="d_order_no" id="ono1"> <span><font color="red" >*</font></span>
				<script type="text/javascript">
					document.getElementById("ono1").value = localStorage.getItem("orderNo");
				</script>
		</div>
		<div class="field-wrap">
					<label class ="active highlight">
					Actual Delivery Date:
					</label>
			<input type="date" name="adelivery_date">
		</div>
		<h4>Select Payment Mode:</h4>
		<div class="field-wrap" style="text-align: center">
			<span>			 
			<input name="group2" type="radio" value="cash" checked />
			CASH
			</span>
			&nbsp&nbsp&nbsp&nbsp
			<span>
			&nbsp&nbsp&nbsp&nbsp
			<input name="group2" type="radio"value="card" />
			CARD</span>
			&nbsp&nbsp&nbsp&nbsp
			<span>
			<input  name="group2" type="radio"  value="cheque"/>
			CHEQUE</span>
		</div>
		<div class="field-wrap">   			
			<label>Enter Amount Paid:</label>
			<input type="text" name="amount_paid"> 
		</div>		
		<input type="submit" class="btn waves-effect waves-light" value="Update Details" name="update">
	</form>	
		</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="index.js"></script>	
</body>
</html>

