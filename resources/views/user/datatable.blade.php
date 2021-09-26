@extends('master_layout')
@section('title', 'Thành viên')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mb-3 p-3">
        <div class="card bg-light ">
          <div class="card-header font-weight-bold ">Xác nhận nhân viên</div>
          <div class="card-body">
            <table class="table table-bordered" id="users_table_confirm">
              <thead>
                <tr>
                  <th>Họ và tên</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Nhà mạng</th>
                  <th>Hành động</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      {{-- active account user news --}}

      <div class="col-12">
        <table class="table table-bordered" id="users_table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created At</th>
              <th>Updated At</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- ./col -->
    </div>

  </div><!-- /.container-fluid -->


@endsection
@push('scripts')
  <script>
    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      // confirm user
			$('#users_table_confirm').DataTable({
				processing: true,
				serverSide: true,
				ajax:{
					url : "{!! route('datatables.data') !!}"
				},
				columns: [
					{ data: 'fullname'},
					{ data: 'email'},
					{ data: 'phone'},
					{ data: 'name'}
				]
			});
      // manager user
        $('#users_table').DataTable({
					processing: true,
					serverSide: true,
					ajax:{
						url : "{!! route('datatables.data') !!}"
					},
					columns: [
						{ data: 'id'},
						{ data: 'name'},
						{ data: 'email'},
						{ data: 'created_at'},
						{ data: 'updated_at'}
					]
        });
    });
  </script>
@endpush