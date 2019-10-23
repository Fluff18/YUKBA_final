$(document).ready(
function(){
$('#data_table').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [0, 'ORDERNO'],
editable: [[6, 'ORDERSTATUS'], [7, 'AMOUNTPAID'], [8, 'ORDERDATE'], [9, 'DELIVERYDATE'], [10, 'ACTUALDELIVERYDATE']]
},
hideIdentifier: true,
url: 'live_edit.php'
});
});