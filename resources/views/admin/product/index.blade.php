@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--Sản phẩm--</p>
	<button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal" href='#add'><i class="glyphicon glyphicon-plus">
	</i>&nbsp&nbsp Thêm mới</button>

	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">Mã</th>
			<th class="white">Tên sản phẩm</th>
			<th class="white">Miêu tả</th>
			<th class="white">Giá bán</th>
			<th class="white">Giá khuyến mãi</th>
			<th class="white">Danh mục</th>
			<th class="white">Action</th>
		</tr>
	</thead>
	<tbody id="product">
		<tr>
			<td id="product">				
			</td>
		</tr>
	</tbody>
</table>
<div class="modal fade" id="add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thêm mới</h4>
			</div>
			<div class="modal-body">
				<form id="add_new" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tên sản phẩm:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Miêu tả</label>
						<textarea class="form-control ckeditor" name="description" id="description"></textarea>
					</div>
					<div class="form-group">
						<label for="">Đơn giá:</label>
						<input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Giá ưu đãi:</label>
						<input type="number" class="form-control" id="promotion_price" name="promotion_price" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label >Danh mục</label>
						<select name="Category" class="form-control" id="category_id">
							@foreach ($category as $value)
							<option value="{{$value->id}}">{{ $value->name }}</option>
							@endforeach	
						</select>
					</div>	
					<button type="submit" class="btn btn-primary">Thêm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editP">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sửa thông tin</h4>
			</div>
			<div class="modal-body">
				<form id="edit_new" method="POST" role="form">
					{{csrf_field()}}
					<input type="hidden" name="" id="edit_id">
					<div class="form-group">
						<label for="">Tên sản phẩm:</label>
						<input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Nhập">
					</div>
					
					<div class="form-group">
						<label for="">Miêu tả</label>
						<textarea class="form-control ckeditor" name="edit_description" id="edit_description"></textarea>
					</div>
					<div class="form-group">
						<label for="">Đơn giá:</label>
						<input type="number" class="form-control" id="edit_unit_price" name="edit_unit_price" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Giá ưu đãi:</label>
						<input type="number" class="form-control" id="edit_promotion_price" name="edit_promotion_price" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label >Danh mục</label>
						<select name="Category" class="form-control" id="edit_category_id">
							@foreach ($category as $value)
							<option value="{{$value->id}}">{{ $value->name }}</option>
							@endforeach	
						</select>
					</div>	

					<button type="submit" class="btn btn-primary">Sửa</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="showDetail">
	<div class="modal-dialog" style="width: 1050px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chi tiết sản phẩm</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered" style="float: left;" id="product_detail-table">
					<thead>
						<tr>
							<th class="white">ID</th>
							<th class="white">Số lượng</th>
							<th class="white">Màu sắc</th>
							<th class="white">Kích cỡ</th>
							<th class="white">Sản phẩm</th>
							<th class="white">Action</th>
						</tr>
					</thead>
					<tbody id=""></tbody>					
				</table>
				<hr style="width:80%;color:gray;float: left;margin-left: 10%">
				<div style="float:left; width:100%">
					<form id="add_new_detail" method="POST" role="form" style="float: left;width:100%;">
						{{csrf_field()}}
						<input type="hidden" name="" id="getIdProduct">
						<div style="width:8%;float: left;margin-left: 15px" class="form-group">
							<label for="">Số lượng:</label>
							<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập">
						</div>
						<div style="width:8%;float: left;margin-left: 15px" class="form-group">
							<label >Màu:</label>
							<select name="" class="form-control" id="color_id">
								@foreach ($color as $value)
								<option value="{{$value->id}}">{{ $value->color_name }}</option>
								@endforeach	
							</select>
						</div>
						<div style="width:8%;float: left;margin-left: 15px" class="form-group">
							<label >Kích cỡ:</label>
							<select name="" class="form-control" id="size_id">
								@foreach ($size as $value)
								<option value="{{$value->id}}">{{ $value->size }}</option>
								@endforeach	
							</select>
						</div>
						<div style="width:27%;float: left;margin-left: 15px" class="form-group">
							<label for="">Hình</label>
							<input type="file" class="form-control" name="image[]" id="image" multiple >
						</div>
						<button style="float: left;margin-top: 25px;margin-left: 23px;" type="submit" class="btn btn-primary">Thêm</button>
					</form>
					<div style="float: left;width: 100%;" id="gallery"></div>
				</div>		
			</div>
			<div style="clear: both;" class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="showImage">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ảnh sản phẩm</h4>
			</div>
			<div class="modal-body">
				<button type="button" id="buttonDelete" class="bt btn-md btn-default">Delete</button>
				<div id="Detail_image"></div>

				<form id="add_image_new" method="POST" role="form">		
					@csrf		
					<div style="float: left;margin-left: 75%" class="form-group">
						<input type="file" class="form-control inputImage" name="newImage[]" id="newImage" multiple>
					</div>			
					<button type="submit" class="buttonImage glyphicon glyphicon-upload"></button>
					
				</form>
				
				<div id="DsAnh"></div>
			</div>
			<div style="clear: both" class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(function() {
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
			ajax: '{!! route('product.anyData') !!}',
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
						$('#gallery').html("");
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

		var idTest = '';
		$(document).on('click','.btn-info', function (e){
			idTest = $(this).attr('showImage');
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
						$('#Detail_image').append(							
							"<img class='suaAnh' id='anh-"+response[i].id+"' src='http://projectla02.com/storage/"+response[i].image+"'>"+
							"<i class='glyphicon glyphicon-remove gly_remove' id='icon-"+response[i].id+"' xoaAnh='"+response[i].id+"'></i>"
							);
					}
				}
			})
		});

		$("#newImage").change(function(){
			$('#DsAnh').html("");
			var total_file=document.getElementById("newImage").files.length;
			for(var i=0;i<total_file;i++)
			{
				$('#DsAnh').append("<img class='suaAnh2' src='"+URL.createObjectURL(event.target.files[i])+"'>");
			}
		});
		$('#add_image_new').on('submit', function(e) {
			e.preventDefault();			
			var newPost = new FormData();
			var files = document.getElementById('newImage').files;	
			for (var i = 0; i < files.length; i++) {
				newPost.append('image[]',files[i]);
			}
			newPost.append('product_detail_id',idTest);
			$.ajax({				
				type: 'post',
				url: '{{asset('admin/product/storeImage')}}',
				dataType:'json',
				data: newPost,
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
						console.log(response);
						toastr.success('Thêm thành công!');								
						// detailTable.ajax.reload();
						// document.getElementById("add_new_detail").reset();
						$('#DsAnh').html("");

						response.map(function(value, index){
							$('#Detail_image').append("<img class='suaAnh' id='anh-"+value.id+"' src='http://projectla02.com/storage/"+value.image+"'>");
						});
						// for(var i=0;i<response.temp.length;i++)
						// {
						// 	$('#Detail_image').append("<img class='suaAnh' id='anh-"+response.temp[i].id+"' src='http://projectla02.com/storage/"+response.temp[i].image+"'>");
						// }
					},
					error: function (error) {
						//500
					}
				})
		});

		$('#buttonDelete').on('click' ,function (){
			$('.gly_remove').toggle(300);
		});
		$(document).on('click', '.gly_remove', function (e) {
			var id = $(this).attr('xoaanh');
			e.preventDefault();
			swal({
				dangerMode: true,
				title: "Bạn có muốn xóa ảnh này không?",
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
						url: '{{asset("")}}admin/product/deleteImage/' + id,
						success: function(res)
						{
							toastr.success('Bài viết đã được xóa!', "");
							$('#icon-' + id).remove();
							$('#anh-' + id).remove();
						},
						error: function (){

						}
					});
				}
			});
		})

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
					//console.log(response);
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
					document.getElementById("add_new").reset();
					CKEDITOR.instances.description.setData(""),
					userTable.ajax.reload();
				},
				error: function (error) {
					toastr.warning(error.responseJSON.errors.name);
					toastr.warning(error.responseJSON.errors.description);
					toastr.warning(error.responseJSON.errors.unit_price);
					toastr.warning(error.responseJSON.errors.promotion_price);
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
</script>
@endsection