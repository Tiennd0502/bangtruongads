@extends('master_layout')
@section('title', 'Nhân viên')
@section('content')
  <div class="container-fluid pl-md-3 pr-md-3">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="card bg-white w-100">
          <div class="card-header font-weight-bold ">Xác nhận nhân viên</div>
          <div class="card-body ">
            <table class="table table-bordered w-100" id="js_users_table_confirm">
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

      <div class="col-12 mb-3">
        <div class="card bg-white w-100">
          <div class="card-header font-weight-bold ">Quản lý nhân viên</div>
          <div class="card-body ">
            <table class="table table-bordered w-100" id="js_users_table_employee_manager">
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
      $('#js_users_table_confirm').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{!! route('user.getConfirm') !!}",
          type: "POST"
        },
        columns: [{
            data: 'fullname',
            name: 'fullname'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'phone',
            name: 'phone'
          },
          {
            data: 'network_operator',
            name: 'network_operator'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          }
        ]
      });
      // confirm user
      $('#js_users_table_employee_manager').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{!! route('user.employeeManager') !!}",
          type: "POST"
        },
        columns: [{
            data: 'fullname',
            name: 'fullname'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'phone',
            name: 'phone'
          },
          {
            data: 'network_operator',
            name: 'network_operator'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          }
        ]
      });

      // action confirm active account user
      $(document).on('click', '.js-user-active', function(el){
        // el.preventDefault();
        let _url = $(this).data('url');
        let _
        console.log(_url);
        $.ajax({
          type: "POST",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          url: _url,
          success: function (response) {
            console.log('true33');
            $(this).parent().remove();
          },
          error: function(error) {
            console.log('loi cmnr');
          }
        });
      });

    });
  </script>
@endpush
