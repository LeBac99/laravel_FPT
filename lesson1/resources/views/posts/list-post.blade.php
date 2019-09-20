@extends('layouts.main')
@section('content') 
	

<table class="table table-striped table-dark">
   <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách bài viết</h3>

          <div class="box-tools">
            <form action="" method="get">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <input type="text" name="keyword" class="form-control pull-right" placeholder="Search" required="bac">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
          </form>
    </div>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col-2">Id </th>
      <th scope="col-2">Title</th>
      <th scope="col-2">image</th>
      <th scope="col-2">Content</th>
       <th scope="col-2">author_id</th>
 <!--       <th scope="col-2">Status</th> -->
      <th>
         @if(Auth::user()->role_id >= 500)
        <a href="{{route('post.add') }}" class="btn btn-primary">Thêm</a> </th>
        @endif
    </tr>
  </thead>
  <tbody>
  	@foreach($baiviet as $bv)
    <tr>
      <th scope="row">{{$bv->id}}</th>
      <td>{{$bv->title}}</td>
      <td><img src="{{$bv->image}}" width="100px"></td>
      <td>{{$bv->content}}</td>
      <td>
          @isset($bv->user->name)
                {{$bv->user->name}}
         @endisset
      </td>
     <!--  <td>
        {{$bv->status}}
      </td> -->
      <td>
         @if(Auth::user()->role_id >= 500)
      	<a href="{{route('post.edit', ['id' => $bv->id])}}" class="btn btn-success">Sửa</a>
        @endif
      </td>
       <td>
         @if(Auth::user()->role_id >= 500)
       <a href="javascript:;" linkurl="{{route('post.delete',['id' => $bv->id])}}" class="btn btn-danger btn-remove");">Xóa</a>
       @endif
      </td>
      @endforeach
      <tr>
        <td colspan="6" class="text-center">{{$baiviet->links()}}</td>
      </tr>    
    </tr>
  </tbody>

</table>
<style type="text/css">
  .close{
    color: #ffffff;
  }
</style>

</body>
</html>
@endsection