@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--Chi tiết sản phẩm--</p>
	<button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal" href='#add'><i class="glyphicon glyphicon-plus">
	</i>&nbsp&nbsp Thêm mới</button>

	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">quantity</th>
			<th class="white">color_id</th>
			<th class="white">size_id</th>
			<th class="white">product_id</th>
			<th class="white">Action</th>
		</tr>
	</thead>
	<tbody id="sizes"></tbody>
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
						<label for="">Số lượng:</label>
						<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label >Sản phẩm:</label>
						<select name="" class="form-control" id="product_id">
							@foreach ($product as $value)
							<option value="{{$value->id}}">{{ $value->name }}</option>
							@endforeach	
						</select>
					</div>
					<div class="form-group">
						<label >Màu:</label>
						<select name="" class="form-control" id="color_id">
							@foreach ($color as $value)
							<option value="{{$value->id}}">{{ $value->color_name }}</option>
							@endforeach	
						</select>
					</div>
					<div class="form-group">
						<label >Kích cỡ:</label>
						<select name="" class="form-control" id="size_id">
							@foreach ($size as $value)
							<option value="{{$value->id}}">{{ $value->size }}</option>
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
	<div class="modal-dialog">
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
						<label for="">Số lượng:</label>
						<input type="number" class="form-control" id="edit_quantity" name="edit_quantity" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label >Sản phẩm</label>
						<select name="" class="form-control" id="edit_product_id">
							@foreach ($product as $value)
							<option value="{{$value->id}}">{{ $value->name }}</option>
							@endforeach	
						</select>
					</div>
					<div class="form-group">
						<label >Màu:</label>
						<select name="" class="form-control" id="edit_color_id">
							@foreach ($color as $value)
							<option value="{{$value->id}}">{{ $value->color_name }}</option>
							@endforeach	
						</select>
					</div>
					<div class="form-group">
						<label >Kích cỡ:</label>
						<select name="" class="form-control" id="edit_size_id">
							@foreach ($size as $value)
							<option value="{{$value->id}}">{{ $value->size }}</option>
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
			order : [0,'desc'],
			serverSide: true,
			ajax: '{!! route('product_detail.anyData') !!}',
			columns: [
			{ data: 'id', name: 'product_details.id' },
			{ data: 'quantity', name: 'product_details.quantity' },
			{ data: 'color_name', name: 'colors.color_name' },
			{ data: 'size', name: 'sizes.size' },
			{ data: 'product_name', name: 'products.name' },
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
				url: '{{asset('admin/product_detail/store')}}',
				data: {
					quantity: $('#quantity').val(),
					product_id: $('#product_id').val(),
					color_id: $('#color_id').val(),
					size_id: $('#size_id').val(),
				},
				success: function (response){
					//console.log(response);
					$('#add').modal('hide');
					$('#size').text(" ");
					toastr.success('Thêm thành công!');					
					var html=
					'<tr id="tr-'+response.id+'>"'+
					'<td>'+response.id+'</td>'+
					'<td>'+response.id+'</td>'+
					'<td>'+response.quantity+'</td>'+
					'<td>'+response.product_id+'</td>'+
					'<td>'+response.color_id+'</td>'+
					'<td>'+response.product_id+'</td>'+
					'<td>'+
					'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
					'<a delete="'+ response.id +'" style="margin-left: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
					'</td>'+
					'</tr>';

					$('#sizes').prepend(html);
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
						url: '{{asset("")}}admin/product_detail/delete/' + id,
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
				url: '{{asset("")}}admin/product_detail/edit/' + id,
				success: function(response){
					$('#edit_id').val(response.id);
					$('#edit_quantity').val(response.quantity);	
					$('#edit_product_id').val(response.product_id);	
					$('#edit_color_id').val(response.color_id);	
					$('#edit_size_id').val(response.size_id);	
				}
			})
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			var id = $('#edit_id').val();
			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/product_detail/update/' + id,
				data: {
					quantity: $('#edit_quantity').val(),
					product_id: $('#edit_product_id').val(),
					color_id: $('#edit_color_id').val(),
					size_id: $('#edit_size_id').val(),
				},
				success: function (response){
					$('#editP').modal('hide');
					console.log(response);
					toastr.success('Sửa thành công!');

					$('#tr-' + response.id).replaceWith(
						'<td>'+response.id+'</td>'+
						'<td>'+response.quantity+'</td>'+
						'<td>'+response.color_id+'</td>'+							
						'<td>'+response.size_id+'</td>'+							
						'<td>'+response.product_id+'</td>'+
						'<td>'+
						'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
						'<a delete="'+ response.id +'" style="margin-left: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
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