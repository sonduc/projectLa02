@extends('admin.layouts.master')
@section('content')
<table class="table table-hover table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--Size--</p>
	<button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal" href='#add'><i class="glyphicon glyphicon-plus">
	</i>&nbsp&nbsp Thêm mới</button>

	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">Size</th>
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
						<label for="">Kích cỡ:</label>
						<input type="number" class="form-control" id="size" name="size" placeholder="Nhập">
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
						<label for="">Kích cỡ:</label>
						<input type="number" class="form-control" id="edit_size" name="edit_size" placeholder="Nhập">
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
			order : [],
			serverSide: true,
			ajax: '{!! route('size.anyData') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'size', name: 'size' },
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
				url: '{{asset('admin/size/store')}}',
				data: {
					size: $('#size').val(),
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
					'<td>'+response.size+'</td>'+
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
						url: '{{asset("")}}admin/size/delete/' + id,
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
				url: '{{asset("")}}admin/size/edit/' + id,
				success: function(response){
					$('#edit_id').val(response.id);
					$('#edit_size').val(response.size);	
				}
			})
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			var id = $('#edit_id').val();
			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/size/update/' + id,
				data: {
					size: $('#edit_size').val(),
				},
				success: function (response){
					$('#editP').modal('hide');
					console.log(response);
					toastr.success('Sửa thành công!');
					
					$('#tr-' + response.id).replaceWith(
						'<td>'+response.id+'</td>'+
						'<td>'+response.size+'</td>'+							
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