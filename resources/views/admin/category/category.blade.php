@extends('author::admin.master.master')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/custom_css/style.css') }}">
@endsection
<section id="main-content">
    <section class="wrapper">
        <h3 style="color:chocolate">Quản Danh Mục</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-6">
                <h4 style="color:coral">Thêm Danh Mục</h4>
                <div class="form-panel">
                    <form role="form" class="form-horizontal style-form" name="parent" method="post" id="form-btn">
                        @csrf
                        <div class="form-group has-success">
                            <label class="col-lg-3 control-label">Danh Mục</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="parent" id="">
                                    <option value="0">----Danh Mục----</option>
                                    {{ GetCategory($category,0,"",0) }}
                                </select>
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-lg-3 control-label">Tên Danh Mục</label>
                            <div class="col-lg-9 ">
                                <input type="text" placeholder="" name="name" id="l-name" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                                <button type="submit" name="sbm" id="btn-sbm" class="btn btn-theme ">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /form-panel -->
            </div>
            <div class="col-lg-6">
                <h4>Sửa Menu</h4>
                <div class="form-panel">
                  <div class="dd list-menu" id="nestable">
                        {{ ShowCategory($category,0,"") }}
                  </div>
                  
                  
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
    </section>
    <!-- /wrapper -->
</section>

@section('script')
@endsection
@endsection
