@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Quản lý tài khoản</h3>
        <!-- row -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4>Danh sách tài khoản</h4>
                        <div style="padding-left:10px">
                            <a href="/admin/users/add" class="btn btn-success">Thêm</a>
                        </div>
                        <hr>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th><i class="fa fa-bullhorn"></i> Email</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i>Name</th>
                                <th><i class="fa fa-bookmark"></i>Địa chỉ</th>
                                <th><i class=" fa fa-edit"></i>Trạng thái</th>
                            </tr>
                        </thead>
                        @foreach($users as $key=>$row)
                        <tbody>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <a href="basic_table.html#">{{ $row->email }}</a>
                                </td>
                                <td class="hidden-phone">{{ $row->name }}</td>
                                <td>{{ $row->address }}</td>

                                <td><span class="label label-info label-mini">Due</span></td>
                                <td>
                                    <a href="{{ $row->id }}" class="btn btn-success btn-xs"><i
                                            class="fa fa-check"></i></a>
                                    <a href="users/edit/{{ $row->id }}" class="btn btn-primary btn-xs"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="users/del/{{ $row->id }}" class="btn btn-danger btn-xs"><i
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
