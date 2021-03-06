@extends('author::admin.master.master')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/custom_css/style.css') }}">
@endsection
<section id="main-content">
    <section class="wrapper">
        <h3>Quản lý danh mục</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-6">
                <h4>Thêm Danh Mục</h4>
                <div class="form-panel">
                    <form role="form" class="form-horizontal style-form" name="parent" method="post" id="form-btn">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-3" for="">Danh mục cha:</label> 
                            <div class="col-lg-9">
                                <select class="form-control" name="parent_id" id="">
                                    <option value="0">----ROOT----</option>
                                    {{ GetCategory($categorys,0,'',$category->parent_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tên Danh Mục</label>
                            <div class="col-lg-9 ">
                                <input id="inputName" type="text" placeholder="" value="{{ $category->name }}" name="name" id="l-name" class="form-control" value="" placeholder="Tên danh mục">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Đường dẫn</label>
                            <div class="col-lg-9 ">
                                <input id="inputSlug" name="slug" type="text" placeholder="" value="{{ $category->slug }}" name="name" id="l-name" class="form-control" value="" placeholder="Đường dẫn">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9 text-center">
                                <button type="submit" name="sbm" id="btn-sbm" class="btn btn-theme ">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /form-panel -->
            </div>
            <div class="col-lg-6">
                <h4>Danh sách Menu</h4>
                <div class="form-panel">
                   
                    <table style="height:12px;" id="myTable" class="table table-striped" >
                        <thead>
                            <tr>
                                <th> Tên danh mục</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                            {{ ShowCategory($categorys,0,'') }}
                           </tr>
                        </tbody>
                    </table>
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
@endsection
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
            jQuery("model-menu .edit-id").val(id);
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
        $("#inputName").keyup(function () {
            var slug = $("#inputName").val();
            slug = slug.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, ''
                );
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, " - ");
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            slug = slug.replace(/ /g, '');
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            $("#inputSlug").val(slug);
        })

        $("#inputName").change(function () {
            var slug = $("#inputName").val();
            slug = slug.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, ''
                );
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, " - ");
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            slug = slug.replace(/ /g, '');
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            $("#inputSlug").val(slug);
        });
    });

</script>
@endsection
