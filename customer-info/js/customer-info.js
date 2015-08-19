$('document').ready(function(){

	// listen for changes on the select element
	$('#customer').change(getCustomerInfo);

});

function getCustomerInfo() {

	// Save the ID of the chosen customer
	var custID = $(this).val();

	// Make sure the value is a number
	if ( isNaN(custID) ) {
		return;
	}

	// Prepare AJAX
	$.ajax({

		url: 'app/get-customer-info.php',
		data: {
			customerID: custID
		},
		success: function(dataFromServer) {

			alert(dataFromServer);

		},
		error: function(){
			console.log('Cannot establish server connection');
		}




	});
}