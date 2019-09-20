@extends('layouts.main')
@section('content')

<form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" value="{{old('name')}}" placeholder="Elnter name " class="form-control">
		@if($errors->first('name'))
		<span class="text" style="color: red">{{$errors->first('name')}}</span>
		@endif
	</div>

	<div class="form-group">
		<label>Image</label>
		<input type="file" name="image" value="{{old('image')}}" class="form-control">
		@if($errors->first('image'))
		<span class="text" style="color: red">{{$errors->first('image')}}</span>
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
		<label>price</label>
		<input type="text" name="price" value="{{old('price')}}" rows="10" class="form-control">
		@if($errors->first('price'))
		<span class="text" style="color: red">{{$errors->first('price')}}</span>
		@endif
	</div>

	<div class="form-group">
		<label>detail</label>
		<input type="text" name="detail" value="{{old('detail')}}" rows="10" class="form-control">
		@if($errors->first('detail'))
		<span class="text" style="color: red">{{$errors->first('detail')}}</span>
		@endif
	</div>

	<div class="form-group">
		<label>amount</label>
		<input type="text" name="amount" value="{{old('amount')}}" rows="10" class="form-control">
		@if($errors->first('amount'))
		<span class="text" style="color: red">{{$errors->first('amount')}}</span>
		@endif
	</div>
	
	
	<div class="checkbox">
	    <label>
	    	<input type="checkbox" name="status" value="1">Status
	    </label>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-sm btn-info">Save</button>
		<a href="/post" title="" class="btn btn-sm btn-danger">Cancel</a>
	</div>
</form>

@endsection