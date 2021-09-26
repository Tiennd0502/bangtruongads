@extends('master_layout')
@section('title','Thêm thành viên')
@section('content')
  <div class="container-fluid pl-md-3 pr-md-3">
    <div class="row">
      <div class="col-lg-12">
        @if (session('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('message') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
        <!-- form thêm slider -->
        <form action="{{ route($current_page . '.store') }}" method="POST" id="createSlider" autocomplete="off" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="created_by" value='' id="created_by">
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="name">Tên đăng nhập</label>
              <input type="text" name="name" class="form-control" value='{{ old('name') }}' id="name"
                placeholder="Tên đăng nhập">
              @error('name')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8 ">
              <label for="password">Mật khẩu</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="********">
              @error('password')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8">
              <label for="fullname">Họ và tên</label>
              <input type="text" name="fullname" class="form-control" value='{{ old('fullname') }}' id="fullname"
                placeholder="Họ và tên">
              @error('fullname')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8 ">
              <label for="email">Email</label>
              <input type="text" name='email' class="form-control" value='{{ old('email') }}' id="email" placeholder="Email">
              @error('email')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8">
              <label for="phone">Số điện thoại</label>
              <input type="text" name="phone" class="form-control" value='{{ old('phone') }}' id="phone"
                placeholder="0909345678">
              @error('phone')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8">
              <label for="address">Địa chỉ</label>
              <input type="text" name="address" class="form-control" value='{{ old('address') }}' id="address"
                placeholder="Địa chỉ tạm trú">
              @error('address')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8">
              <label for="office_id">Văn phòng làm việc</label>
              <select id="office_id" class="form-control" name="office_id">
                  <option value=""> Chọn vị trí văn phòng </option>
                @foreach ($offices as $office)
                  <option value="{{$office->id}}" {{ (old('office') == $office->id ) ? 'selected' :'' }}>{{ $office->name }}</option>
                @endforeach
              </select>
              @error('office_id')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8">
              <label for="position_id">Vị trí</label>
              <select id="position_id" class="form-control" name="position_id">
                <option value=""> Chọn vị trí công việc </option>
                @foreach ($positions as $position)
                  <option value="{{$position->id}}" {{ (old('position') == $position->id ) ? 'selected' :'' }}>{{ $position->name }}</option>
                @endforeach
              </select>
              @error('position_id')
                <div class="text-danger font-italic">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-8">
              <label for="active">Trạng thái</label>
              <select id="active" class="form-control" name="active">
                <option value="0" {{ (old('active') == '0' ) ? 'selected' :'' }}>Hủy kích hoạt</option>
                <option value="1" {{ (old('active') == '1' ) ? 'selected' :'' }}>Kích hoạt</option>
              </select>
            </div>
            
            <div class="form-group col-md-8">
              <div class="form-upload" id="Avatar">
                <label class="insert-attach" for="image-avatar"><i class="fas fa-camera-retro mr-2"></i> Ảnh đại diện( Chỉ
                  chọn 1 ảnh)</label>
              </div>
              <div class="list-attach">
                <ul class="attach-view avatar-image">
                  <li class="img-box d-none">
                    <input type="file" id="image-avatar" value="{{ old('avatar')}}" name="avatar" class="form-control js-image-item d-none">
                    <span class="icon-close"><i class="fas fa-times-circle"></i></span>
                    <img src="" class="delete_img">
                  </li>
                  <li class="" id="insert-attach-image">
                    <label class="insert-attach" for="image-avatar"><i class="fas fa-plus"></i></label>
                  </li>
                </ul>
              </div>
              @error('avatar')
                <div class='text-danger font-italic'> {{ $message }} </div>
              @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Lưu lại</button>
          <button type="reset" class="btn btn-primary">Nhập lại</button>
          <a href="{{ route($current_page . '.index') }}" class="btn btn-primary">Danh sách thành viên</a>
        </form>
      </div>
      <!-- ./col -->
    </div>
    
  </div><!-- /.container-fluid -->
@endsection
