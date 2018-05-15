@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--SLide Ảnh--</p>
	<button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal" href='#add'><i class="glyphicon glyphicon-plus">
	</i>&nbsp&nbsp Thêm mới</button>

	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">Name</th>
			<th class="white">Image</th>
			<th class="white">Link</th>
			<th class="white">Product_id</th>
			<th class="white">Action</th>
		</tr>
	</thead>
	<tbody id="images"></tbody>
</table>
<div class="modal fade" id="add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thêm mới</h4>
			</div>
			<div class="modal-body">
				<form id="add_new" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tên ảnh:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Hình</label>
						<input type="file" class="form-control" name="image" id="image">
					</div>
					<div class="form-group">
						<label for="">Link:</label>
						<input type="text" class="form-control" id="link" name="link" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label >Sản phẩm:</label>
						<select name="" class="form-control" id="product_id">
							@foreach ($product as $value)
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
						<label for="">Tên ảnh:</label>
						<input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Hình</label>
						<br>
						<img style="margin-bottom: 3px" width="100px" id="old_image" src="">
						<input type="file" class="form-control" name="edit_image" id="edit_image">
					</div>
					<div class="form-group">
						<label for="">Link:</label>
						<input type="text" class="form-control" id="edit_link" name="edit_link" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label >Sản phẩm:</label>
						<select name="" class="form-control" id="edit_product_id">
							@foreach ($product as $value)
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
			order : [],
			serverSide: true,
			ajax: '{!! route('slide.anyData') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'image', name: 'image' },
			{ data: 'link', name: 'link' },
			{ data: 'product_id', name: 'product_id' },
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
			var file = $('#image').get(0).files[0];	
			var newPost = new FormData();
			newPost.append('name',$('#name').val());
			newPost.append('link',$('#link').val());
			newPost.append('product_id',$('#product_id').val());				
			newPost.append('image',file);
			$.ajax({				
				type: 'post',
				url: '{{asset('admin/slide/store')}}',
				data: newPost,
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
					//console.log(response);
					$('#add').modal('hide');
					$('#name').text(" ");
					toastr.success('Thêm thành công!');					
					var html=
					'<tr id="tr-'+response.id+'>"'+
					'<td>'+response.id+'</td>'+
					'<td>'+response.id+'</td>'+
					'<td>'+response.name+'</td>'+
					'<td>'+response.image+'</td>'+
					'<td>'+response.product_id+'</td>'+
					'<td>'+
					'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
					'<a delete="'+ response.id +'" style="margin-left: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
					'</td>'+
					'</tr>';

					$('#images').prepend(html);
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
						url: '{{asset("")}}admin/slide/delete/' + id,
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
				url: '{{asset("")}}admin/slide/edit/' + id,
				success: function(response){
					$('#edit_id').val(response.id);
					$('#edit_name').val(response.name);	
					$('#edit_link').val(response.link);	
					$('#old_image').attr('src','{{asset('')}}upload/slide/'+response.image+'');	
					$('#edit_product_id').val(response.product_id);	
				}
			})
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			var id = $('#edit_id').val();
			var file = $('#edit_image').get(0).files[0];	
			var newPost = new FormData();
			newPost.append('name',$('#edit_name').val());
			newPost.append('link',$('#edit_link').val());
			newPost.append('product_id',$('#edit_product_id').val());				
			newPost.append('image',file);
			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/slide/update/' + id,
				data: newPost,
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
					$('#editP').modal('hide');
					//console.log(response);
					toastr.success('Sửa thành công!');
					
					$('#tr-' + response.id).replaceWith(
						'<td>'+response.id+'</td>'+
						'<td>'+response.code+'</td>'+
						'<td>'+response.color_name+'</td>'+							
						'<td>'+response.product_id+'</td>'+
						'<td>'+
						'<a edit="'+ response.id +'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>'+
						'<a delete="'+ response.id +'" style="margin-left: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>'+
						'</td>'+
						'</tr>'
						);	
					$('#edit_id').val(response.id);
					$('#color_name').text(response.color_name);
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