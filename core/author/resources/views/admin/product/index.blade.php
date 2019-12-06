@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Quản lý sản phẩm</h3>
        <!-- row -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4>Danh sách sản phẩm</h4>
                        <div style="padding-left:10px">
                            <a href="/admin/product/add" class="btn btn-success">Thêm</a>
                        </div>
                        <hr>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá chung</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($db as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td class="hidden-phone">{{ $item->price }}</td>
                                <td>@if($item->state == 0){{ 'Hết hàng' }}@else {{ 'Còn hàng' }} @endif</td>

                                <td><span class="label label-info label-mini">@if($item->featured == 0){{ 'Không' }}@else {{ 'Có' }} @endif</span></td>
                                <td>
                                    <a href="" class="btn btn-success btn-xs"><i
                                            class="fa fa-check"></i></a>
                                    <a href="product/edit/{{ $item->id }}" class="btn btn-primary btn-xs"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="product/del/{{ $item->id }}" class="btn btn-danger btn-xs"><i
                                            class="fa fa-trash-o "></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
                <!-- /content-panel -->
            </div>
            <!-- /col-md-12 -->
        </div>
        <!-- /row -->
    </section>
</section>
@stop
