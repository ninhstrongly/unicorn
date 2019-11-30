@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!-- /row -->
        <div class="row mt">
            <form action="" method="post">
                @csrf
                <div class="col-md-12" style="margin:0 auto">
                    <h4>Thêm giá trị thuộc tính <span style="color:red">{{ $db->name }}</span> </h4>
                    <div class="panel panel-blue">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="">Tên giá trị thuộc tính của thuộc tính <span style="color:red">{{ $db->name }}</span></label>
                                <input type="text" value="" name="name" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
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
