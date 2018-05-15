@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--Sản phẩm--</p>
	<button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal" href='#add'><i class="glyphicon glyphicon-plus">
	</i>&nbsp&nbsp Thêm mới</button>

	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">Code</th>
			<th class="white">Name</th>
			<th class="white">Description</th>
			<th class="white">Unit_price</th>
			<th class="white">Promotion_price</th>
			<th class="white">Category_id</th>
			<th class="white">Action</th>
		</tr>
	</thead>
	<tbody id="product">
		<tr>
			<td id="image">
				
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
@endsection
@section('script')
<script type="text/javascript">
	$(function() {
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
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
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
		$(document).on('click', '.btn-danger', function (e) {
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