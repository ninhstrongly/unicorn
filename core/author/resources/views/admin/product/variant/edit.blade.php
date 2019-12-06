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
                                <table class="panel-body">
                                    <thead>
                                        <tr>
                                            <th width='33%'>Biến thể</th>
                                            <th width='33%'>Giá (có thể trống)</th>
                                            <th width='33%'>Tuỳ chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->variant as $var)
                                        <tr>
                                            <td scope="row">
                                                @foreach ($var->values as $value)
                                                {{ $value->attribute->name }}:{{ $value->value }},
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input value="{{ $var->price }}" name="variant[{{ $var->id }}]" class="form-control"
                                                        placeholder="Giá cho biến thể" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <a id="" class="btn btn-warning"
                                                    href="/admin/product/del-variant/{{ $var->id }}"
                                                    role="button">Xoá</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
