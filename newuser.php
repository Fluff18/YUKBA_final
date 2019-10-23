<html>
<head>
<?php include 'css/css.html'; ?>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="uploadscript.js"></script>

<style>

</style>


<title>User</title>
<nav>
<ul id="navul">
	<li id="navli"><a href="new-1.php" id="nava">Home</a></li>
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
<body >



<div class="form">
<h1>New User</h1>

<form  enctype="multipart/form-data" name="order_form" action="yukbasql.php"  method="POST" >

<div class="field-wrap">
	<label class="active highlight">Order No</label>
		<input type="text" name="order_number" id="order_number" value="<?php
		//$sql = "SELECT MAX(ORDERNO) FROM theyukbauser";
		include("credentials.php");




		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$cookie = $_COOKIE['email'];
		//echo $cookie;
		$sql = "SELECT * FROM `theyukbauser` WHERE BOUTIQUE_EMAIL = '$cookie' ";
		$result = $conn->query($sql);
		$len=$result->num_rows;
		$highest_id=$result->num_rows +1;
		echo("$highest_id");
		?>  " >
</div>


<div class="field-wrap">
	<label>Phone number : <span class="req">*</span></label>
	<input type="text" name="phone_number" autocomplete="off" >
	<span class="error"></span>
</div>

<div class="field-wrap">
	<label>Full name : <span class="req">*</span></label>
	<input type="text" name="name" >
</div>

<div class="field-wrap">
	<label>Email address : <span class="req">*</span></label>
	<input type="email" name="email">
</div>

<div class="field-wrap">
<label class="active highlight">Date Of Order</label>
	<input type="date" name="date_of_order" value="<?php echo date('Y-m-d'); ?>">
</div>

<div class="field-wrap">
	<textarea name="address" placeholder="Address"></textarea>
</div>

<!-- //Items list -->

<h4>Items: </h4>

<div class="field-wrap">
	<table class="order-list">
		<thead>
			<tr><td>Item</td><td>Price</td><td>Quantity</td><td>Amount</td></tr>
		</thead>

		<tbody>
			<tr>
				<td><input type="text" class="validate" name="item_name" /></td>
				</div>
				<div class="clear">
				<td><input type="text" name="item_rate" class="validate" /></td>
				</div>
				<td><input type="text" name="item_quantity" class="validate"/></td>
				<td><input type="text" name="item_amount" readonly="readonly" style= "color: white" class="validate"/></td>
				<td><a class="deleteRow"> x </a></td>
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="5" style="text-align: center;">
					<input type="button" id="addrow" value="Add Product" class=" btn waves-effect waves-light"/>
				</td>
			</tr>
		</tfoot>
	</table>
</div>

<div class="field-wrap">
	<label class="active highlight">Total Amount : </label>
	<input type="text" id="total_amount" name="sub_total" class="validate" oninput="calculate()">
</div>

		<!--changed from "discount" to "advance paid" -->
<div class="field-wrap">
	<label>Advance Paid : </label>
		<input type="text" id="advance_paid" name="discount" class="validate" oninput="calculate()">
</div>

<div class="field-wrap">
	<label class="active highlight">Total Amount to be paid : </label>
		<input type="text" id="amount_to_be_paid" class="validate" name="total_amount_to_be_paid">
</div>


<div class="field-wrap">
		<label class="active highlight">Date of Delivery : </label>
		<input type="date" name="date_of_delivery" class="validate">
</div>

<div class="field-wrap">
	<textarea name="comments" placeholder="Add Your Comments Here !" class="validate" ></textarea>
</div>


		<div id="filediv"><input name="file[]" type="file" id="file"/></div>
		<input type="button" id="add_more" class="upload btn waves-effect waves-light" value="Add More Files" style=" margin-top:1rem"/>
		<br>
		<br>
		<input class="btn waves-effect waves-light" type = "submit" value = "Submit" onClick="foo()"  style="margin-bottom:1rem; width:15%;">
		<input type="reset" name="clear" value="Clear" onClick="clearField();" class="btn waves-effect waves-light" style="margin-bottom:1rem;width:15%;">
		<div class="link" align="center">
		<button class="btn waves-effect waves-light red lighten-2">
		<a href="print.php" target="_blank" class="link" autofocus style="color: white;">Print Bill</a>
		</button>
		</div>

</form>
</div>
</center>
</div>
<div class="col s2">
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="index.js"></script>
</body>
<script>
function myFunction() {
	var phone1 = document.getElementById("phone123").value;
	//alert(phone1);

   window.open("https://www.newlookboutique.com/web/measurement.php?phone="+phone1, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=500,height=800");
	    //window.open("http://localhost/YUKBA/web/measurement.php?phone="+phone1, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=500,height=800");

}

function calculate() {
	var x = document.getElementById('total_amount').value;
	var y = document.getElementById('advance_paid').value;
	var amount_to_be_paid = document.getElementById('amount_to_be_paid');
	var myResult = x - y;
	amount_to_be_paid.value = myResult;
}


$(document).ready(function () {
    var counter = 1;

    $('#addrow').on("click", function () {
        counter++;
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" name="item_name' + counter + '"/></td>';
        cols += '<td><input type="text" name="item_rate' + counter + '"/></td>';
        cols += '<td><input type="text" name="item_quantity' + counter + '"/></td>';
        cols += '<td><input type="text" name="item_amount' + counter + '" readonly="readonly"/></td>';
        cols += '<td><a class="deleteRow"> x </a></td>';
        newRow.append(cols);

        $("table.order-list").append(newRow);
    });

    $("table.order-list").on("change", 'input[name^="item_rate"], input[name^="item_quantity"]', function (event) {
        calculateRow($(this).closest("tr"));
        calculateGrandTotal();
    });

    $("table.order-list").on("click", "a.deleteRow", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
    });


  $('#save').click(function(){

  var item_name = [];
  var item_rate = [];
  var item_quantity = [];
  var item_amount = [];

  var order_num = ($('input[name^="order_number"]').val());


  $('input[name^="item_name"]').each(function(){
   item_name.push($(this).val());
  });

  $('input[name^="item_rate"]').each(function(){
   item_rate.push($(this).val());
  });
  $('input[name^="item_quantity"]').each(function(){
   item_quantity.push($(this).val());
  });
  $('input[name^="item_amount"]').each(function(){
   item_amount.push($(this).val());
  });

  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{order_num:order_num, item_name:item_name, item_rate:item_rate, item_quantity:item_quantity, item_amount:item_amount},
   success:function(data){
    alert(data);
   }
  });
 });

function calculateRow(row) {
    var price = +row.find('input[name^="item_rate"]').val();
    var qty = +row.find('input[name^="item_quantity"]').val();
    row.find('input[name^="item_amount"]').val((price * qty).toFixed(2));
}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="item_amount"]').each(function () {
        grandTotal += +$(this).val();
    });
	$(document).find('input[name^="sub_total"]').val(grandTotal.toFixed(2));
    //$("#total_amount").text(grandTotal.toFixed(2));
}
});























function clearForm() {
if(document.getElementById) {
document.myForm.reset();
}
}
</script>

</html>
