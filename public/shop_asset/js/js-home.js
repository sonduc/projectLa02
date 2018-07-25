jQuery(document).ready(function($){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
		}
	});
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	$('.product__inside__image').on('click', function() {
		var id = $(this).attr('idImage');
		$.ajax({
			type:'get',
			url: path + 'shop/modalDetail/' + id,
			success: function(response){
				//console.log(response);
				$('#addImage').html("");
				$('#addImage').append("<img src='http://projectla02.com/storage/"+response.temp+"'>");
				$('#codeProduct').text(response.product.code);
				$('#nameProduct').text(response.product.name);
				$('#descriptionProduct').html(response.product.description);
				var unit_price = addCommas(response.product.unit_price);
				$('#unitPrice').text(unit_price+'.VNĐ');
				var promotion_price = addCommas(response.product.promotion_price);
				$('#promotionPrice').text(promotion_price+'.VNĐ');
				$('#nameColor').text(response.color.color_name);
				$('#colorProduct').css('background-color',response.color.code);
				$('#sizeProduct').text(response.size.size);
			}
		})
	});
	$('#valueDetail').on('click', function(e) {
		e.preventDefault();
		$.ajax({
			type:'post',
			url: path + 'shop/postCart',
			data: { 
				id : $('#maSP').attr("maSP"),
				name : $('#tenSP').attr("tenSP"),
				quantity : $('#qtySP').val(),
				price : $('#priceSP').attr("priceSP"),
				size : $('#sizeProduct').attr("sizeSP"),
				color : $('#nameColor').attr("colorSP"),
				image : $('#anhSP').attr("anhSP"),
			},
			success: function(response){
				console.log(response);
				toastr.success('Thêm thành công!');
			}
		})		
	});
	$('.deleteSP').on('click',function(e){
		e.preventDefault();
		var rowID = $(this).attr('rowID');
		var id = $('#idSP').attr('idSP');
		//console.log(id);
		swal({
			dangerMode: true,
			title: "Bạn có muốn xóa sản phẩm này không?",
			icon: "warning",
			buttons: {
				cancel: 'Hủy',
				confirm: 'Xóa'
			}
		})
		.then((willDelete) => {
			if (willDelete) {
				console.log(id);
				$.ajax({
					type: "post",
					url:  path + 'shop/deleteDetail',
					data:{
						rowID: rowID,
					},
					success: function(res)
					{
						console.log(res);
						toastr.success('Sản phẩm đã được xóa!', "");
						$('#tr-' + id).remove();
						
					},
					error: function (){

					}
				});
			}
		});
	})

	$('#deleteCart').on('click', function(e) {
		e.preventDefault();
		//console.log(id);
		swal({
			dangerMode: true,
			title: "Bạn có muốn xóa giỏ hàng này không?",
			icon: "warning",
			buttons: {
				cancel: 'Hủy',
				confirm: 'Xóa'
			}
		})
		.then((willDelete) => {
			if (willDelete) {
				//console.log(id);
				$.ajax({
					type: "post",
					url:  path + 'shop/destroyCart',
					// data:{
					// 	rowID: rowID,
					// },
					success: function(res)
					{
						console.log(res);
						toastr.success('Sản phẩm đã được xóa!', "");
						$('.tr-cart').remove();
					},
					error: function (){

					}
				});
			}
		});
	})

	$('#menuCart').on('click', function() {
		window.location = 'http://projectla02.com/shop/cart';
	})
});