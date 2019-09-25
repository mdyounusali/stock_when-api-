var manageDebitTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageDebitTable = $("#manageDebitTable").DataTable({
		'ajax': 'php_action/fetchcedit.php',
		'order': []		
	});
$("#date").datepicker();
	// submit brand form function
	$("#submitcreditForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var date = $("#date").val();
		var credit_type = $("#purpose").val();
		var amount = $("#amount").val();

		if(date == "") {
			$("#date").after('<p class="text-danger">field is required</p>');
			$('#date').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#date").find('.text-danger').remove();
			// success out for form 
			$("#date").closest('.form-group').addClass('has-success');	  	
		}
		
		if(credit_type == "") {
			$("#date").after('<p class="text-danger"> field is required</p>');
			$('#date').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#credit_type").find('.text-danger').remove();
			// success out for form 
			$("#credit_type").closest('.form-group').addClass('has-success');	  	
		}

		if(amount == "") {
			$("#amount").after('<p class="text-danger">field is required</p>');

			$('#amount').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#amount").find('.text-danger').remove();
			// success out for form 
			$("#amount").closest('.form-group').addClass('has-success');	  	
		}

		if(date && credit_type && amount) {
			var form = $(this);
			// button loading
			$("#createBrandBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createcreditBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageCreditTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitcreditForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-brand-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit brand form function

});

function editcredit(creditId = null) {
	if(creditId) {
		// remove hidden brand id text
		$('#creditId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-credit-result').addClass('div-hide');
		// modal footer
		$('.editBrandFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelecteddebit.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editBrandName').val(response.brand_name);
				// setting the brand status value
				$('#editBrandStatus').val(response.brand_active);
				// brand id 
				$(".editBrandFooter").after('<input type="hidden" name="creditId" id="creditId" value="'+response.credit_id+'" />');

				// update brand form 
				$('#editcreditForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var date = $('#date').val();
					var credit_type = $('#purpose').val();
					var amount = $('#editamount').val();

					if(date == "") {
						$("#date").after('<p class="text-danger"> field is required</p>');
						$('#date').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#date").find('.text-danger').remove();
						// success out for form 
						$("#date").closest('.form-group').addClass('has-success');	  	
					}
					
					
					if(debit_type == "") {
						$("#debit_type").after('<p class="text-danger"> field is required</p>');

						$('#debit_type').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#debit_type").find('.text-danger').remove();
						// success out for form 
						$("#credit_type").closest('.form-group').addClass('has-success');	  	
					}

					if(debit_amount == "") {
						$("#debit_amount").after('<p class="text-danger"> field is required</p>');

						$('#debit_amount').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#debit_amount").find('.text-danger').remove();
						// success out for form 
						$("#debit_amount").closest('.form-group').addClass('has-success');	  	
					}

					if(date && debit_type && debit_amount) {
						var form = $(this);

						// submit btn
						$('#editBrandBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editBrandBtn').button('reset');

									// reload the manage member table 
									manageBrandTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-brand-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

function removedebit(debitId = null) {
	if(brandId) {
		$('#removecreditId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedcredit.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				$('.removeBrandFooter').after('<input type="hidden" name="removeBrandId" id="removeBrandId" value="'+response.brand_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeBrandBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeBrandBtn").button('loading');

					$.ajax({
						url: 'php_action/removecredit.php',
						type: 'post',
						data: {creditId : creditId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeBrandBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the brand table 
								manageBrandTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removecreditFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function