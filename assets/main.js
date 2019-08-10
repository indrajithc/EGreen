(function(document, window, $) {

	$('#doPayPayment').on('click', function(e){
		
		if( $('.modal-content .parsley-success').length == 4 ) {

			var number = $('#cardtextBox1').val() + $('#cardtextBox2').val() + $('#cardtextBox3').val() + $('#cardtextBox4').val();
			$('.app-messgae').html();
			$.ajax({
				url: "../ajax.php", 
				type: 'POST',
				data:{
					'type': 'doPayment',
					'card_no': number,
					'amount': $('.payable-price-label').html(),
				},
				success: function(result){
		        	console.log(result);
		        	if( result == 'success' ) {
		        		$('#doPayPayment').prop('disabled', true);
		        		$('.custom-message').html('<span class="success">Payed Successfully!</span>');
		        		setTimeout(function() {
						    $('#model-close-btn').trigger('click');
						}, 2000);
						$('.app-messgae').html('<div class="alert alert-success alert-dismissible" role="alert">Appointment taken successfully! custom????' + $('#app-date-picker').val() + '</div>');
		        	} else if( result == 'invalid' ) {
		        		$('#doPayPayment').prop('disabled', false);
		        		$('.custom-message').html('<span class="error">Invalid card number or Insufficient amount!</span>');
		        	}else{
		        		$('#doPayPayment').prop('disabled', false);
		        	}
		    	}
			});
		}
	})
	$("#card-form").submit(function(e) {
	    e.preventDefault();
	});

	$('#payment-model-gen').on('click', function(){
		$('#paymentModelBox').modal('show');
	});
})(document, window, jQuery);