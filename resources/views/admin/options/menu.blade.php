@extends('author::admin.master.master')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/custom_css/style.css') }}">
@endsection
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Quản Lý Menu</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-5">
                <h4><i class="fa fa-angle-right"></i>Thêm Menu</h4>
                <div class="form-panel">
                    <form role="form" class="form-horizontal style-form" method="post" id="form-btn">
                        @csrf
                        <div class="form-group has-success">
                            <label class="col-lg-2 control-label">Tên Menu</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="" name="menu_name" id="f-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-lg-2 control-label">Đường Link</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="" name="menu_link" id="l-name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <a id="btn-sbm" class="btn btn-theme ">Thêm</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /form-panel -->
            </div>
            <div class="col-lg-7">
                <h4><i class="fa fa-angle-right"></i> Sửa Menu</h4>
                <div class="form-panel">
                  <div class="dd list-menu" id="nestable">
                      @php
                      if (empty($showMenu)) {
                      echo 'Chưa có menu';
                      }
                      else{
                      echo $showMenu;
                      }
                      @endphp
                  </div>
                  <form action="{{ route('update.menu') }}" method="post">
                      @csrf
                      <textarea id="nestable-output" name="menu_content" rows="3"
                          class="form-control hidden"></textarea>
                      <div class="form-group text-center">
                          <input type="submit" class="btn btn-primary" id="save-menu" name="save_menu"
                              value="Cập nhật" disabled />
                      </div>
                  </form>
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
                <h4 class="modal-title" id="editModalLabel" style="width: 50%">Cập nhật menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="width: 50%; text-align: right">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Tên hiển thị</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control edit-name" placeholder="Tên hiển thị"
                            required />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Đường dẫn</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control edit-link" placeholder="Đường dẫn"
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
<script src="{{ asset('admin/custom_js/jquery.nestable.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {

        jQuery(".edit-menu").click(function (e) {
            e.preventDefault();
            jQuery(this).parent().parent().addClass("editing");
            var name = jQuery(this).parent().parent().data("name"),
                link = jQuery(this).parent().parent().data("link");
            jQuery("#modal-menu .edit-name").val(name);
            jQuery("#modal-menu .edit-link").val(link);
            $('#modal-menu').modal('show');
        });

        jQuery(".exit-modal").click(function () {
            jQuery(this).parents("body").find(".editing").removeClass("editing");
        });

        (function ($) {
            jQuery(".save-edit-menu").click(function () {
                var name = jQuery(this).parents("#modal-menu").find(".edit-name").val(),
                    link = jQuery(this).parents("#modal-menu").find(".edit-link").val();
                jQuery(".dd-item.editing").data("name", name);
                jQuery(".dd-item.editing").data("link", link);
                jQuery(".dd-item.editing>.dd-handle").html(name);
                jQuery(".dd-item.editing").removeClass("editing");
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                jQuery("#save-menu").prop("disabled", false); // Element(s) are now enabled.
            });

            jQuery(".remove-menu").click(function (e) {
                e.preventDefault();
                if (confirm("Xóa menu này và các phần tử bên trong?")) {
                    jQuery(this).parent().parent().remove();
                    updateOutput($('#nestable').data('output', $('#nestable-output')));
                    $("#save-menu").prop("disabled", false); // Element(s) are now enabled.
                }
            });

            'use strict';

            /*
            Update Output
            */
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            /*
            Nestable 1
            */
            $('#nestable').nestable({
                group: 1
            }).on('change', function () {
                $("#save-menu").prop("disabled", false); // Element(s) are now enabled.
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            });

            /*
            Output Initial Serialised Data
            */
            $(function () {
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            });
        }).apply(this, [jQuery]);

        $( "#btn-sbm" ).click(function() {
          $( "#form-btn" ).submit();
        });
    });

</script>
@endsection
@endsection
