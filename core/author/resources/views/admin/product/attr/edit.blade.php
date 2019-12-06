@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!-- /row -->
        <div class="row mt">
            <form action="" method="post">
                @csrf
                <div class="col-md-12" style="margin:0 auto">
                    <h4>Sửa thuộc tính {{ $db->name }}</h4>
                    <div class="panel panel-blue">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="">Tên Thuộc tính</label>
                                <input type="text" value="{{ $db->name }}" name="name" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <div><button class="btn btn-success" type="submit">Sửa</button></div>
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
