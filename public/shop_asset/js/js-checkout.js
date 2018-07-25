jQuery(document).ready(function($){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
		}
	});


	$('#form-user').on('click', function(){
		$('#fromCheckUser').submit();
	})


	$('#fromCheckUser').on('submit',function (e){
		e.preventDefault();
		var nameUser = $('#nameUser').val();
		var emailUser = $('#emailUser').val();
		var addressUser = $('#addressUser').val();
		var phoneUser = $('#phoneUser').val();
		var url = path + 'shop/postCheckout';
		console.log(url);
		$.ajax({
			type:'post',
			url: path + 'shop/postCheckout',
			data: {
				name: nameUser,
				email: emailUser,
				address: addressUser,
				phone_number: phoneUser,
			},
			success: function(response){
				console.log(response);
				toastr.success('Đặt hàng thành công!');
			}
		});
	})
});