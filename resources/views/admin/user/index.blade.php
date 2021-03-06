@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--Khách hàng--</p>
	<button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal" href='#add'><i class="glyphicon glyphicon-plus">
	</i>&nbsp&nbsp Thêm mới</button>

	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">Name</th>
			<th class="white">Email</th>
			<th class="white">Address</th>
			<th class="white">Phone_number</th>
			<th class="white">Action</th>
		</tr>
	</thead>
	<tbody id="category"></tbody>
</table>
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thêm mới</h4>
			</div>
			<div class="modal-body">
				<form id="add_new" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tên:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Địa chỉ:</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu:</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Nhập">
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
						<label for="">Tên:</label>
						<input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Địa chỉ:</label>
						<input type="text" class="form-control" id="edit_address" name="edit_address" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<input type="number" class="form-control" id="edit_phone_number" name="edit_phone_number" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu:</label>
						<input type="password" class="form-control" id="edit_password" name="edit_password" placeholder="Nhập">
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
			ajax: '{!! route('user.anyData') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
			{ data: 'address', name: 'address' },
			{ data: 'phone_number', name: 'phone_number' },
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

			console.log($('#name').val());
			console.log($('#email').val());
			console.log($('#address').val());
			console.log($('#password').val());
			$.ajax({				
				type: 'post',
				url: "{{ route('user.store') }}",
				data: {
					name: $('#name').val(),
					email: $('#email').val(),
					address: $('#address').val(),
					phone_number: $('#phone_number').val(),
					password: $('#password').val(),
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
					'<td>'+response.name+'</td>'+
					'<td>'+response.email+'</td>'+
					'<td>'+response.phone_number+'</td>'+
					'<td>'+
					'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
					'<a delete="'+ response.id +'" style="margin-left: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
					'</td>'+
					'</tr>';

					$('#category').prepend(html);
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
						url: '{{asset("")}}admin/user/delete/' + id,
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
				url: '{{asset("")}}admin/user/edit/' + id,
				success: function(response){
					$('#edit_id').val(response.id);
					$('#edit_name').val(response.name);	
					$('#edit_address').val(response.address);	
					$('#edit_phone_number').val(response.phone_number);	
				}
			})
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			var id = $('#edit_id').val();
			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/user/update/' + id,
				data: {
					name: $('#edit_name').val(),
					address: $('#edit_address').val(),
					phone_number: $('#edit_phone_number').val(),
					password: $('#edit_password').val(),
				},
				success: function (response){
					$('#editP').modal('hide');
					console.log(response);
					toastr.success('Sửa thành công!');
					
					$('#tr-' + response.id).replaceWith(
						'<td>'+response.id+'</td>'+
						'<td>'+response.name+'</td>'+							
						'<td>'+response.slug+'</td>'+
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