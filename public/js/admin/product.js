$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
		}
	});		
	var userTable = $('#users-table').DataTable({
		language: {
			"decimal":        "",
			"emptyTable":     "No data available in table",
			"info":           "Showing _START_ to _END_ of _TOTAL_ entries",
			"infoEmpty":      "Showing 0 to 0 of 0 entries",
			"infoFiltered":   "(filtered from _MAX_ total entries)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Show _MENU_ entries",
			"loadingRecords": "Loading...",
			"processing":     "Processing...",
			"search":         "Tìm kiếm:",
			"zeroRecords":    "No matching records found",
			"paginate": {
				"first":      "First",
				"last":       "Last",
				"next":       "Tiếp",
				"previous":   "Trước"
			},
			"aria": {
				"sortAscending":  ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			}
		},
		processing: true,
		order : [[ 0, 'desc' ]],
		ordering: true,
		serverSide: true,
		//ajax: '{!! route('product.anyData') !!}',
		ajax: '{{asset("admin/product/anyData")}}',
		columns: [
		{ data: 'id', name: 'products.id' },
		{ data: 'code', name: 'products.code' },
		{ data: 'name', name: 'products.name' },
		{ data: 'description', name: 'products.description' },
		{ data: 'unit_price', name: 'products.unit_price' },
		{ data: 'promotion_price', name: 'products.promotion_price' },
		{ data: 'category_name', name: 'categories.name' },
		{ data: 'action', name: 'action' },
		]
	});
	$(document).on('click', '.btn-warning', function(){
		$('#showDetail').modal('show');
		var id = $(this).attr('show');			
		$('#getIdProduct').val(id);

		var detailTable = $('#product_detail-table').DataTable({
			processing: true,
			order : [[ 0, 'desc' ]],
			ordering: true,
			serverSide: true,
			destroy: true,
			ajax: '{{asset("")}}admin/product/showDetail/' + id,
			columns: [
			{ data: 'id', name: 'product_details.id' },
			{ data: 'quantity', name: 'product_details.quantity' },
			{ data: 'color_name', name: 'colors.color_name' },
			{ data: 'size', name: 'sizes.size' },
			{ data: 'product_name', name: 'products.name' },
			{ data: 'action', name: 'action' },
			]
		});

		$("#image").change(function(){
			$('#gallery').html("");
			var total_file=document.getElementById("image").files.length;
			for(var i=0;i<total_file;i++)
			{
				$('#gallery').append("<img class='suaAnh' src='"+URL.createObjectURL(event.target.files[i])+"'>");
			}
		});
		$('#add_new_detail').on('submit',function(e){
			e.preventDefault();			
			var newPost = new FormData();
			var files = document.getElementById('image').files;	
			for (var i = 0; i < files.length; i++) {
				newPost.append('image[]',files[i]);
			}
				//console.log($('#quantity').val());
				newPost.append('quantity',$('#quantity').val());
				newPost.append('color_id',$('#color_id').val());
				newPost.append('size_id',$('#size_id').val());
				newPost.append('product_id',$('#getIdProduct').val());
				$.ajax({				
					type: 'post',
					url: '{{asset('admin/product/storeDetail')}}',
					dataType:'json',
					data: newPost,
					async:false,
					processData: false,
					contentType: false,
					success: function (response){
						//console.log(response);
						toastr.success('Thêm thành công!');								
						detailTable.ajax.reload();
						document.getElementById("add_new_detail").reset();
						//document.getElementsByClassName("gallery").reset();
					},
					error: function (error) {
						//500
					}
				})
			});
		$(document).on('click', '#deleteDetailProduct', function (e) {
			var id = $(this).attr('deleteDetail');
			e.preventDefault();
			swal({
				dangerMode: true,
				title: "Bạn có muốn xóa viết này không?",
				icon: "warning",
				buttons: {
					cancel: 'Hủy',
					confirm: 'Xóa'
				}
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "delete",
						url: '{{asset("")}}admin/product/deleteDetail/' + id,
						success: function(res)
						{
							toastr.success('Bài viết đã được xóa!', "");
							detailTable.ajax.reload();
								//$('#tr-' + id).remove();
							},
							error: function (){

							}
						});
				}
			});
		})
	});
	$(document).on('click','.btn-info', function (e){
		$('#showImage').modal('show');
		var id = $(this).attr('showImage');
		$.ajax({
			type: 'get',
			url: '{{asset("")}}admin/product/showImage/' + id,
			success: function(response){
					//console.log(response);
					$('#Detail_image').html("");
					for(var i=0;i<response.length;i++)
					{
						$('#Detail_image').append("<img class='suaAnh' src='http://projectla02.com/storage/"+response[i].image+"'>");
					}
				}
			})
	});

	$('#add_new').on('submit',function(e) {
		e.preventDefault();
		$.ajax({				
			type: 'post',
			url: '{{asset('admin/product/store')}}',
			data: {
				name: $('#name').val(),
				description: CKEDITOR.instances.description.getData(),
				unit_price: $('#unit_price').val(),
				promotion_price: $('#promotion_price').val(),
				category_id: $('#category_id').val(),
			},
			success: function (response){
				console.log(response);
				$('#add').modal('hide');
				$('#name').text(" ");
				toastr.success('Thêm thành công!');

				var html=
				'<tr id="tr-'+response.id+'>"'+
				'<td>'+response.id+'</td>'+
				'<td>'+response.id+'</td>'+
				'<td>'+response.code+'</td>'+
				'<td>'+response.name+'</td>'+
				'<td>'+response.description+'</td>'+
				'<td>'+response.unit_price+'</td>'+
				'<td>'+response.promotion_price+'</td>'+
				'<td>'+response.slug+'</td>'+
				'<td>'+response.category_id+'</td>'+
				'<td>'+
				'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
				'<a delete="'+ response.id +'" style="margin-top: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
				'</td>'+
				'</tr>';

				$('#product').prepend(html);
				userTable.ajax.reload();
			},
			error: function (error) {
					//500
				}
			})
	});
	$(document).on('click', '#deleteProduct', function (e) {
		var id = $(this).attr('delete');
		e.preventDefault();
		swal({
			dangerMode: true,
			title: "Bạn có muốn xóa viết này không?",
			icon: "warning",
			buttons: {
				cancel: 'Hủy',
				confirm: 'Xóa'
			}
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "delete",
					url: '{{asset("")}}admin/product/delete/' + id,
					success: function(res)
					{
						toastr.success('Bài viết đã được xóa!', "");
						$('#tr-' + id).remove();
					},
					error: function (){

					}
				});
			}
		});
	})
	$(document).on('click', '.btn-success', function() {
		$('#editP').modal('show');

		var id = $(this).attr('edit');

		$.ajax({
			type: 'get',
			url: '{{asset("")}}admin/product/edit/' + id,
			success: function(response){
				$('#edit_id').val(response.id);
				$('#edit_name').val(response.name);	
				CKEDITOR.instances.edit_description.setData(response.description);
				$('#edit_unit_price').val(response.unit_price);	
				$('#edit_promotion_price').val(response.promotion_price);	
				$('#edit_category_id').val(response.category_id);	
			}
		})
	});
	$('#edit_new').on('submit',function(e) {
		e.preventDefault();
		var id = $('#edit_id').val();
		$.ajax({
			type: 'post',
			url: '{{asset("")}}admin/product/update/' + id,
			data: {
				name: $('#edit_name').val(),
				description: CKEDITOR.instances.edit_description.getData(),
				unit_price: $('#edit_unit_price').val(),
				promotion_price: $('#edit_promotion_price').val(),
				category_id: $('#edit_category_id').val(),
			},
			success: function (response){
				$('#editP').modal('hide');
				console.log(response);
				toastr.success('Sửa thành công!');

				$('#tr-' + response.id).replaceWith(
					'<td>'+response.id+'</td>'+
					'<td>'+response.code+'</td>'+
					'<td>'+response.name+'</td>'+
					'<td>'+response.description+'</td>'+
					'<td>'+response.unit_price+'</td>'+
					'<td>'+response.promotion_price+'</td>'+
					'<td>'+response.quantity+'</td>'+
					'<td>'+response.slug+'</td>'+
					'<td>'+response.category_id+'</td>'+
					'<td>'+
					'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
					'<a delete="'+ response.id +'" style="margin-top: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
					'</td>'+
					'</tr>'
					);	
				$('#edit_id').val(response.id);
				$('#edit_name').text(response.name);

				userTable.ajax.reload();
			},
			error: function (error) {
					//500
				}
			})
	});
});