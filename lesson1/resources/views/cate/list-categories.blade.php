@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách bài viết</h3>

          <div class="box-tools">
          	<form action="" method="get">
	            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
	              <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">

	              <div class="input-group-btn">
	                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	              </div>
	            </div>
        	</form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tbody>
					<tr>
					  <th>ID</th>
					  <th>name</th>
					  <th>Image</th>
					  <th>Product</th>
					 
					  <th>
					  	 @if(Auth::user()->role_id >= 500)
					  	<a href="{{route('cate.add')}}" class="btn btn-sm btn-success">Add</a>
					  	@endif
					  </th>
					</tr>
					@foreach($baiviet as $bv)
					<tr>
						<td>{{$bv->id}}</td>
						<td>{{$bv->name}}</td>
						
						<td>
							<img src="{{$bv->image}}" width="70">
						</td>
						<td>
							@isset($bv->products)
									{{count($bv->products)}}
							@endisset
						</td>
						
						<td> @if(Auth::user()->role_id >= 500)
							<a href="{{route('cate.edit', ['id' => $bv->id])}}" class="btn btn-sm btn-info">Sửa</a>@endif
						</td>
						<td>
							 @if(Auth::user()->role_id >= 500)
							 <a href="javascript:;" linkurl="{{route('deletecate',$bv->id)}}" class="btn btn-danger btn-remove");">Xóa</a>@endif
						</td>
						 
						</tr>
					@endforeach
					<tr>
						<td colspan="5" class="text-center">{{ $baiviet->links() }}</td>
					</tr>
				</tbody>
			</table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
{{-- <form action="" method="get">
	<input type="text" name="keyword" placeholder="Tìm kiếm...">
	<button type="submit">tim</button>
</form>
<table>
	<tbody>
		
	</tbody>
</table> --}}
@endsection