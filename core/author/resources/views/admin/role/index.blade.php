@extends('author::admin.master.master')
@section('content')
	<section id="main-content">
		<section class="wrapper">
		  <h3><i class="fa fa-angle-right"></i>Quản lý quyền</h3>
		  <!-- row -->
		  <div class="row mt">
			<div class="col-md-12">
			  <div class="content-panel">
				<table class="table table-striped table-advance table-hover">
				  <h4>Danh sách quyền</h4>
				  <div style="padding-left:10px">
					<a href="/admin/role/add" class="btn btn-success" >Thêm</a>
				  </div>
				  <hr>
				  <thead>
					<tr>
					   <th>STT</th>
					  <th>Name</th>
					  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Display Name</th>
					</tr>
				  </thead>
				  
				  <tbody>
					@foreach($list as $key=>$row) 
					<tr>
					  <td>{{ $key+1 }}</td>
					  <td>
						<a href="basic_table.html#">{{ $row->name }}</a>
					  </td>
					  <td class="hidden-phone">{{ $row->display_name }}</td>
					  <td>
						<a href="" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
						<a href="role/edit/{{ $row->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
						<a href="role/del/{{ $row->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
