@extends('layouts.main')
@section('content')

<form action="{{route('cate.add')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>name</label>
		<input type="text" name="name" value="{{old('name')}}" placeholder="Enter name..." class="form-control">
		@if($errors->first('name'))
		<span class="text-danger" style="color: red">{{$errors->first('name')}}</span>
		@endif
	</div>

	<div class="form-group">
		<label>Image</label>
		<input type="file" name="image" value="{{old('image')}}" class="form-control">
		@if($errors->first('image'))
		<span class="text-danger" style="color: red">{{$errors->first('image')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>description</label>
		<input type="text"  name="description" rows="10" class="form-control" value="{{ old('description') }}">
		@if($errors->first('description'))
		<span class="text-danger" style="color: red">{{$errors->first('description')}}</span>
		@endif
	</div>

	<div class="text-center">
		<button type="submit" class="btn btn-sm btn-info">Save</button>
		<a href="/cate" title="" class="btn btn-sm btn-danger">Cancel</a>
	</div>
</form>

@endsection