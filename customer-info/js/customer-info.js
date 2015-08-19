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

		// Create an ul
		var ul = $('<ul>');

		// Insert the data 
		$(ul).append('<li>'+dataFromServer.phone+'</li>');
		$(ul).append('<li>'+dataFromServer.email+'</li>');

		// add this new unorderd list to the customer-info div
		$('#customer-info').html(ul);

		},
		error: function(){
			console.log('Cannot establish server connection');
		}




	});
}