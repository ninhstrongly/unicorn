@extends('author::admin.master.master')
@section('content')
@section('css')
<style>
    .panel-blue {
        background: #30a5ff;
        color: #fff;
        
    }

    .panel-teal {
        background: #1ebfae;
        color: #fff;
    }

    .panel-orange {
        background: #ffb53e;
        color: #fff;
    }

    .panel-red {
        background: #f9243f;
        color: #fff;
    }


    .widget-left {
        height: 80px;
        padding-top: 20px;
        text-align: center;
        position: relative;
    }

    .widget-left .delete-attr {
        position: absolute;
        width: 50px;
        height: 21px;
        background-color: red;
        color: white;
        bottom: 0;
        right: 0;
    }

    .widget-left .edit-attr {
        position: absolute;
        width: 50px;
        height: 21px;
        background-color: #1383da;
        color: white;
        bottom: 0;
        left: 0;
    }

    .row .boxattr {
        display: flex;
    }

    .boxattr .text-attr {
        position: relative;
        text-transform: uppercase;
        color: white;
        padding-top: 12px;
        size: 15px;
        font-weight: bold;
        background-color: coral;
        margin-right: 10px;
        width: 100px;
        text-align: center;
        cursor: pointer;
    }

    .boxattr .text-attr .edit-value {
        color: white;
        width: 35%;
        height: 44%;
        background-color: #30a5ff;
        bottom: 0;
        left: 0;
        position: absolute;
        display: none;

    }

    .boxattr .text-attr .del-value {
        color: white;
        width: 35%;
        height: 44%;
        background-color: red;
        bottom: 0;
        right: 0;
        position: absolute;
        display: none;

    }

    .boxattr .text-attr .add-value {
        color: white;

    }

    .text-attr:hover>.del-value {
        display: block;
    }

    .text-attr:hover>.edit-value {
        display: block;
    }

    .text-attr:hover {
        background-color: rgb(189, 52, 3);

    }

    .widget-right {
        text-align: left;
        line-height: 1.6em;
        margin: 0px;
        padding: 17px;
        height: 80px;
        color: #999;
        font-weight: 300;
        background: #fff;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

</style>
@endsection
<section id="main-content">
    <section class="wrapper">
        <!-- /row -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4>Thêm sản phẩm</h4>
                @foreach ($db as $item)
                <div class="col-md-2 panel-blue widget-left">
                    <strong class="large">{{ $item->name }}</strong>
                    <a class="delete-attr" href="/admin/product/del-attr/{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                    <a class="edit-attr" href="/admin/product/edit-attr/{{ $item->id }}"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="col-md-10 widget-right boxattr">
                    @foreach ($item->values as $row)
                    <div class="text-attr">{{ $row->value }}
                        <a href="/admin/product/edit-value/{{ $row->id }}" class="edit-value"><i class="fa fa-pencil"></i></a>
                        
                        <a href="/admin/product/del-value/{{ $row->id }}" class="del-value"><i class="fa fa-trash-o"></i></a>
                    </div>
                    @endforeach
                    <div class="text-attr"><a href="/admin/product/add-value/{{ $item->id }}" class="add-value"><i class="fa fa-plus-square"></i></i></a></div>
                </div>
                @endforeach
                <div class=" add-task-row">
                    <a class="btn btn-success btn-sm pull-left" href="/admin/product/add-attr">Thêm thuộc tính</a>
                </div>
            </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
    </section>
    <!-- /wrapper -->
</section>
@endsection
