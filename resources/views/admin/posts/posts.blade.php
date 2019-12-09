@extends('author::admin.master.master')
@section('content')
@section('css')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3>Quản lý bài viết</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Thêm mới</a>
                <table class="table table-bordered data-table " id="myTable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Đường dẫn</th>
                            <th>Mô tả ngắn</th>
                            <th>Nội dung</th>
                            <th width="280px">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Tên" value=""
                                maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Đường dẫn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Mô tả ngắn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="short_desc" name="short_desc"
                                placeholder="Mô tả ngắn" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nội dung</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <label for="password" class="control-label col-lg-2">Chọn ảnh đại diện</label>
                        <div class="form-group col-md-10">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-box" style="position: relative;width: 100%;">
                                        <input id="thumbnail" type="text" name="image" class="form-control" value=""
                                            readonly="" placeholder="Đường dẫn ảnh"
                                            style="position: relative;width: 100%;">

                                        <button type="button" class="btn btn-success btn-add"
                                            style="position: absolute;right: 0;top: 0; height: 35px">Thêm ảnh
                                        </button>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center" id="avatar1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Lưu thay đổi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
{{--  <script>CKEDITOR.replace('content1');</script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('posts.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'short_desc',
                    name: 'short_desc'
                },
                {
                    data: 'content',
                    name: 'content'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            "order": [],
            stateSave: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#createNewProduct').click(function () {
            $('#saveBtn').val("create-product");
            $('#id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Thêm bài viết");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editProduct', function () {
            var id = $(this).data('id');
            $.get("{{ route('posts.index') }}" + '/' + id + '/edit', function (data) {
                $('#modelHeading').html("Sửa bài viết");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#slug').val(data.slug);
                $('#short_desc').val(data.short_desc);
                $('#content').val(data.content);
                $('#thumbnail').val(data.image);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Lưu thay đổi');

            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('posts.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Lỗi');
                }
            });
        });

        $('body').on('click', '.deleteProduct', function () {

            var id = $(this).data("id");
            confirm("Bạn có chắc chắn muốn xóa !");

            $.ajax({
                type: "DELETE",
                url: "{{ route('posts.store') }}" + '/' + id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    });
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

                    t.closest('.row').find('#avatar1').eq(0).html("<img src='" +
                        file
                        .getUrl() +
                        "' class='imgProduct img-thumbnail' width='200'/>");

                });
            }
        });

    });

</script>
@endsection
@endsection
