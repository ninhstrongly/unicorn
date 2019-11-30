@extends('author::admin.master.master')
@section('content')
<section id="main-content">
<section class="wrapper">
    <!-- /row -->
    <div class="row mt">
    <div class="col-lg-12">
        <h4><i class="fa fa-angle-right"></i>Thêm tài khoản</h4>
        <div class="form-panel">
        <div class="form">
            <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="">
            @csrf
            <div class="form-group ">
                <label for="firstname" class="control-label col-lg-2">Email</label>
                <div class="col-lg-10">
                <input class=" form-control" id="firstname" value="{{ $users->email }}" name="email" type="text" />
                </div>
            </div>
            <div class="form-group ">
                <label for="lastname" class="control-label col-lg-2">Password</label>
                <div class="col-lg-10">
                <input class=" form-control" id="lastname" value="{{ $users->password }}"  name="pass" type="password" />
                </div>
            </div>
            <div class="form-group ">
                <label for="username" class="control-label col-lg-2">Tên</label>
                <div class="col-lg-10">
                <input class="form-control " id="username" value="{{ $users->name }}"  name="name" type="text" />
                </div>
            </div>
            <div class="form-group ">
                <label for="password" class="control-label col-lg-2">Địa chỉ</label>
                <div class="col-lg-10">
                <input class="form-control " id="password" value="{{ $users->address }}"  name="address" type="text" />
                </div>
            </div>
            <div class="form-group ">
                <label for="password" class="control-label col-lg-2">Điện thoại</label>
                <div class="col-lg-10">
                <input class="form-control " id="password" value="{{ $users->phone }}"  name="phone" type="text" />
                </div>
            </div>
            <div class="form-group ">
                <label for="newsletter" class="control-label col-lg-2 col-sm-3">Chọn quyền</label>
                <div class="col-lg-10 col-sm-9">
                @foreach($listRole as $row)
                <label for="password" class="control-label col-lg-2">{{ $row->name }}</label>
                <input type="checkbox" {{ $listRoleAll->contains($row->id) ? 'checked' : '' }}  value="{{ $row->id }}" style="width: 20px" class="checkbox form-control" id="newsletter" name="roles[]" />
                @endforeach
               
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-theme" type="submit">Thêm</button>
                <button class="btn btn-theme04" type="button">Hủy</button>
                </div>
            </div>
            </form>
        </div>
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
</section>
<!-- /wrapper -->
</section>

 @stop