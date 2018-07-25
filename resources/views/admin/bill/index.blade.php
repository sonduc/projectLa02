@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="users-table">
	<p style="text-align: center;color: cornflowerblue;font-size: 50px;">--Hóa đơn--</p>
	<thead>
		<tr>
			<th class="white">ID</th>
			<th class="white">Ngày giao hàng</th>
			<th class="white">Tổng tiền</th>
			<th class="white">Khách hàng</th>
			<th class="white">Action</th>
		</tr>
	</thead>
	<tbody id="category"></tbody>
</table>

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
							<th class="white">Giá tiền</th>
							<th class="white">Kích cỡ</th>
							<th class="white">Màu</th>
							<th class="white">Sản phẩm</th>
						</tr>
					</thead>
					<tbody id=""></tbody>					
				</table>	
			</div>
			<div style="clear: both;" class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(function() {
		var userTable = $('#users-table').DataTable({
			processing: true,
			order : [[ 0, 'desc' ]],
			ordering: true,
			serverSide: true,
			ajax: '{!! route('bill.anyData') !!}',
			columns: [
			{ data: 'id', name: 'bills.id' },
			{ data: 'date_order', name: 'bills.date_order' },
			{ data: 'total_price', name: 'bills.total_price' },
			{ data: 'nameUser', name: 'users.name' },
			{ data: 'action', name: 'action' },
			]
		});
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(document).on('click', '.btn-warning', function(){
			$('#showDetail').modal('show');
			var id = $(this).attr('show');
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
				{ data: 'unit_price', name: 'product_details.unit_price' },
				{ data: 'size', name: 'product_details.size' },
				{ data: 'color_name', name: 'product_details.color_name' },
				{ data: 'product_detail_id', name: 'product_details.product_detail_id' },
				]
			});
		})

	});
</script>

@endsection