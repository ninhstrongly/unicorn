@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!-- /row -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4>Thêm sản phẩm</h4>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action=""
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="">Chọn danh mục:</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="parent_id" id="">
                                        <option value="0">----ROOT----</option>
                                        {{ GetCategory($db,0,'',$product->category_id) }}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Tên sản phẩm</label>
                                <div class="col-lg-10">
                                    <input  id="inputName" class=" form-control" value="{{ $product->name }}"name="name"
                                        type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Đường dẫn</label>
                                <div class="col-lg-10">
                                    <input id="inputSlug" value="{{ $product->slug }}" class=" form-control" name="slug"
                                        type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Giá <a
                                        href="/admin/product/edit-variant/{{ $product->id }}">(Sửa giá biến
                                        thể)</a></label>
                                <div class="col-lg-10">
                                    <input class=" form-control" value="{{ $product->price }}" id="lastname"
                                        name="price" type="number" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Sản phẩm nổi bật</label>
                                <div class=" col-lg-10">
                                    <select class="form-control" name="featured">
                                        <option @if($product->featured == 0){{ 'selected' }} @endif value="0">Không
                                        </option>
                                        <option @if($product->featured == 1){{ 'selected' }} @endif value="1">Có
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Trạng thái</label>
                                <div class=" col-lg-10">
                                    <select class="form-control" name="state">
                                        <option @if($product->state == 0){{ 'selected' }} @endif value="0">Hết hàng
                                        </option>
                                        <option @if($product->state == 1){{ 'selected' }} @endif value="1">Còn hàng
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-2">Mô tả</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="describe" id="description"
                                        rows="10">{{ $product->describe }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="">Chọn thuộc tính</label>
                                <div class="col-lg-10">
                                    <div class="panel-body tabs">
                                        <label>Các thuộc Tính</label>
                                        <ul class="nav nav-tabs">
                                            <?php 
                                                    $i = 0;
                                                ?>
                                            @foreach($attr as $row)
                                            <li @if($i==0) class='active' @endif><a href="#tab{{ $row->id }}"
                                                    data-toggle="tab">{{ $row->name }}</a></li>
                                            <?php 
                                                    $i = 1;
                                                ?>
                                            @endforeach()

                                            <li><a href="#tab-add" data-toggle="tab">+</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($attr as $row)
                                            <div class="tab-pane fade @if($i==1) active @endif in"
                                                id="tab{{ $row->id }}">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            @foreach($row->values as $item)
                                                            <th>{{ $item->value }}</th>
                                                            @endforeach()

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            @foreach($row->values as $item)
                                                            <td> <input @if(check_value($product,$item->id))checked
                                                                @endif class="form-check-input" type="checkbox"
                                                                name="attr[{{ $row->id }}][]" value="{{ $item->id }}">
                                                            </td>
                                                            @endforeach()
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                            </div>
                                            <?php 
                                                    $i = 2;
                                                ?>
                                            @endforeach()
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <label for="password" class="control-label col-lg-2">Chọn ảnh đại diện</label>
                                <div class="form-group col-md-10">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="input-box" style="position: relative;width: 100%;">
                                                <input id="thumbnail" type="text" name="image" class="form-control"
                                                    value="{{ $product->img ? $product->img : ''}}"
                                                    readonly="" placeholder="Đường dẫn ảnh"
                                                    style="position: relative;width: 100%;">

                                                <button type="button" class="btn btn-success btn-add"
                                                    style="position: absolute;right: 0;top: 0; height: 35px">Thêm ảnh
                                                </button>
                                            </div>

                                        </div>
                                        <div class="col-md-3 text-center" id="avatar">
                                            <img src='{{ $product->img ? $product->img : ''}}'
                                                class='imgProduct img-thumbnail' width='200' />
                                        </div>
                                    </div>
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
@endsection
@section('script')
<script>
    CKEDITOR.replace('description');

</script>
<script>
    $('body').on('click', '.btn-add', function () {
        var t = $(this);
        CKFinder.popup({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();

                    t.parent().find('#thumbnail').eq(0).val(file.getUrl());

                    t.closest('.row').find('#avatar').eq(0).html("<img src='" +
                        file
                        .getUrl() +
                        "' class='imgProduct img-thumbnail' width='200'/>");

                });
            }
        });

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

</script>
@endsection
