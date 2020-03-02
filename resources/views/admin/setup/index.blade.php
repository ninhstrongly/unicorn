@extends('author::admin.master.master')
@section('content')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3>Quản lý Cronjob</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <table class="table table-bordered data-table " id="myTable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Đổi trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                        @foreach($data as $key=>$item)
                        <tr class="row_td">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->time }}</td>
                            <td class="status">{{ $item->status == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt'  }}</td>
                            <td>
                                <a id="change_status" href=""><i class="fa fa-exchange"></i></a>
                                <input type="text" style="display:none" value="{{ $item->id}}" class="id_time">
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(params) {
        $('body').on('click','#change_status',function(e){
            e.preventDefault();
            let id = $(this).parents('.row_td').find('.id_time').val();
            $.ajax({
                url:'{{ route('setup.crontab.change_status') }}',
                type:'post',
                data:{id:id,"_token": "{{ csrf_token() }}",}
            }).done(res=>{
                swal({
                    title: "Thông báo!!!",
                    icon: 'warning',
                    text: 'Thành công'
                }).then(()=>{
                    console.log(res);
                    if(res == 1){
                        $.ajax({
                            url:'{{ route('setup.crontab.run') }}',
                            type:'post',
                            data:{check:1,"_token": "{{ csrf_token() }}"}
                        }).done(data=>{
                            $(this).parents('.row_td').find('.status').html('Đã kích hoạt');
                        });
                    }else{
                        $(this).parents('.row_td').find('.status').html('Chưa kích hoạt');
                    }
                });
            });
        });
    });

</script>
@endsection
@endsection
