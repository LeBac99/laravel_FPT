@extends('layouts.main')
@section('content')

<form action="{{route('post.add')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" value="{{old('title')}}" placeholder="Enter title..." class="form-control">
		@if($errors->first('title'))
		<span class="text-danger" style="color: red">{{$errors->first('title')}}</span>
		@endif
	</div>

	<div class="form-group">
		<label>Image</label>
		<input type="file" name="image" value="{{old('image')}}" class="form-control">
		@if($errors->first('image'))
		<span class="text-danger"style="color: red">{{$errors->first('image')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			@foreach ($cates as $ca)
			<option value="{{$ca->id}}">{{$ca->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Author</label>
		<select name="author_id" class="form-control">
			@foreach ($authors as $au)
			<option value="{{$au->id}}">{{$au->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" rows="10" class="form-control">{{ old('content') }}</textarea>@if($errors->first('content'))
		<span class="text-danger"style="color: red">{{$errors->first('content')}}</span>
		@endif
	
	</div>
	<div class="form-group">
		<label>Publish date</label>
		<input type="date" name="publish_date" value="{{old('publish_date')}}" class="form-control">
		@if($errors->first('publish_date'))
		<span class="text-danger"style="color: red">{{$errors->first('publish_date')}}</span>
		@endif
	</div>
	
	<div class="checkbox">
	    <label>
	    	<input type="checkbox" name="status" value="1"> Status
	    </label>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-sm btn-info">Save</button>
		<a href="/post" title="" class="btn btn-sm btn-danger">Cancel</a>
	</div>
</form>

@endsection