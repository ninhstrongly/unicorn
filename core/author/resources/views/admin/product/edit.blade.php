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
                        <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Tên sản phẩm</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" value="{{ $product->name }}" id="firstname" name="name" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Giá <a href="/admin/product/edit-variant/{{ $product->id }}">(Sửa giá biến thể)</a></label>
                                <div class="col-lg-10">
                                    <input class=" form-control" value="{{ $product->price }}" id="lastname" name="price" type="number" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Sản phẩm nổi bật</label>
                                <div class=" col-lg-10">
                                    <select class="form-control" name="featured">
                                        <option @if($product->featured == 0){{ 'selected' }} @endif value="0">Không</option>
                                        <option @if($product->featured == 1){{ 'selected' }} @endif value="1">Có</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Trạng thái</label>
                                <div class=" col-lg-10">
                                    <select class="form-control" name="state">
                                        <option @if($product->state == 0){{ 'selected' }} @endif  value="0">Hết hàng</option>
                                        <option @if($product->state == 1){{ 'selected' }} @endif value="1">Còn hàng</option>
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
                                                <li @if($i==0) class='active'@endif><a href="#tab{{ $row->id }}" data-toggle="tab">{{ $row->name }}</a></li>
                                                <?php 
                                                    $i = 1;
                                                ?>
                                                @endforeach()
    
                                                <li><a href="#tab-add" data-toggle="tab">+</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                @foreach($attr as $row)
                                                <div class="tab-pane fade @if($i==1) active @endif in" id="tab{{ $row->id }}">
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
                                                                <td> <input @if(check_value($product,$item->id))checked @endif class="form-check-input" type="checkbox" name="attr[{{ $row->id }}][]" value="{{ $item->id }}"> </td>
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



                            <div class="form-group" style="margin-top: 20px;">
                                <label class="col-md-2">Chọn ảnh sản phẩm</label>
                                <div class="form-group col-md-10">
                                    <input type="button" class="btn btn-info" id="add" name="action" value="Chọn ảnh">
                                    <input type="hidden" name="list_img[]" id="list-img"
                                        value='<?php echo isset($_POST['list_img']) ? $_POST['list_img'] : '' ?>'>
                                </div>
                                <div class="col-sm-12 text-center" id="img-cat">
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
    jQuery('body').on('click', '#add', function () {
        // var arr_url =($('#list-img').val()=='')?[]:($('#list-img').val());
        var t = $(this);
        var arr_url = (t.closest('.col-md-12').find('#list-img').val() == '') ? [] : (t.closest('.col-md-12')
            .find('#list-img').val());

        if (typeof (arr_url) == 'string') {
            //console.log(arr_url);
            arr_url = arr_url.replace(/\[/g, '');
            arr_url = arr_url.replace(/\]/g, '');
            arr_url = arr_url.replace(/"/g, '');
            arr_url = (arr_url == '') ? [] : arr_url.split(",");
            //arr_url = arr_url.split(",");
        }
        CKFinder.popup({
            resourceType: "Images",
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    //var arr_url = [];
                    var mul = evt.data.files;

                    mul = Object.entries(mul);
                    mul = mul[1];
                    mul = mul[1];

                    var list_img = '';
                    //console.log(mul);
                    for (var i = mul.length - 1; i >= 0; i--) {
                        arr_url.push(mul[i].getUrl());
                        list_img = list_img +
                            "<div class='single-img'><i class='fa fa-remove delete-img' data-url='" +
                            mul[i].getUrl() + "'></i><img alt='' src='" + mul[i].getUrl() +
                            "' class='img-cat' width='200' height='200'/></div>";
                    }
                    arr_url = JSON.stringify(arr_url);

                    t.closest('.col-md-12').find('#list-img').eq(0).val(arr_url);
                    t.closest('.col-md-12').find('#img-cat').eq(0).append(list_img);
                });
            }
        });
    });
    $('body').on('click', '.delete-img', function () {
        var image = $(this).data('url');
        $(this).parent().remove();

        var string = $('#list-img').val();
        var string_arr = JSON.parse(string);
        console.log(string_arr);

        string_arr = jQuery.grep(string_arr, function (value) {
            return value !== image;
        });
        console.log(string_arr);

        var final_string = JSON.stringify(string_arr);
        $('#list-img').val(final_string);
    });
</script>
@endsection
