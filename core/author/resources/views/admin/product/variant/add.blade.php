@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!-- /row -->
        <div class="row mt">
            <form action="" method="post">
                @csrf
                <div class="col-md-12" style="margin:0 auto">
                    <h4>Thêm biến thể cho sản phẩm <span style="color:red">{{ $data->name }}</span> </h4>
                    <div class="panel panel-blue">
                        <div class="panel-body">
                            <div class="panel-body" align='center'>
                                @foreach ($data->variant as $var)
                                <div class="form-group">
                                    @foreach ($var->values as $key=>$value)
                                    <label for="" class="text-left col-md-1">{{ $value->attribute->name }}:{{ $value->value }}</label>
                                    @endforeach
                                    
                                    <div class="col-md-9">
                                        <input name="variant[{{ $var->id }}]" class="form-control"
                                        placeholder="Giá cho biến thể" value="">
                                    </div>
                                    <div class="col-md-1">
                                        <a id="" class="btn btn-warning" href="/admin/product/del-variant/{{ $var->id }}">Xoá</a>
                                    </div>
                                                    
                                </div>
                                <div class="form-group imgs col-md-12 text-left" style="margin-top: 20px;">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-info" id="add" name="action" value="Chọn ảnh">
                                        <input type="hidden" name="list_img[]" id="list-img"
                                            value='<?php echo isset($_POST['list_img']) ? $_POST['list_img'] : '' ?>'>
                                    </div>
                                    <div class="col-sm-12 text-center" id="img-cat">
                                    </div>
                                </div>
                                @endforeach
                                <hr>
                        </div>
                        <div><button class="btn btn-success" type="submit">Thêm</button></div>
                    </div>
                </div>
        </div>
        </form>
        <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
    </section>
    <!-- /wrapper -->
</section>
@stop
@section('script')
<script>
        jQuery('body').on('click', '#add', function () {
            // var arr_url =($('#list-img').val()=='')?[]:($('#list-img').val());
            var t = $(this);
            var arr_url = (t.closest('.imgs').find('#list-img').val() == '') ? [] : (t.closest('.imgs')
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
                                "<div class='single-img' style='float:left'><i class='fa fa-remove delete-img' data-url='" +
                                mul[i].getUrl() + "'></i><img alt='' src='" + mul[i].getUrl() +
                                "' class='img-cat' width='200' height='200'/></div>";
                        }
                        arr_url = JSON.stringify(arr_url);
    
                        t.closest('.imgs').find('#list-img').eq(0).val(arr_url);
                        t.closest('.imgs').find('#img-cat').eq(0).append(list_img);
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
