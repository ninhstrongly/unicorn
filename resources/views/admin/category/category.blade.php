@extends('author::admin.master.master')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/custom_css/style.css') }}">
@endsection
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Quản Danh Mục</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-6">
                <h4><i class="fa fa-angle-right"></i>Thêm Danh Mục</h4>
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
                <h4><i class="fa fa-angle-right"></i> Sửa Menu</h4>
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
<div id="modal-menu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex">
                <h4 class="modal-title" id="editModalLabel" style="width: 50%">Cập nhật Danh Mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="width: 50%; text-align: right">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Danh Mục</label>
                    <div class="col-sm-9">
                        
                            <select class="form-control" name="parent" id="">
                                    <option value="0">----Danh Mục----</option>
                                    {{ GetCategory($category,0,"",0) }}
                                </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Tên Danh Mục</label>
                    <div class="col-lg-9">
                            <input type="text" name="name" class="form-control edit-name" placeholder="Tên hiển thị"
                            required />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-dismiss save-edit-menu" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="material-icons">&#xE876;</i>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body text-center">
          <h4>Great!</h4>	
          <p>Your account has been created successfully.</p>
          <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button>
        </div>
      </div>
    </div>
  </div>
@section('script')
@endsection
@endsection
