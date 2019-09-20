@extends('layouts.main')
@section('content')
<form action="{{route('product.edit', ['id' => $model->id])}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" value="{{old('name',$model->name)}}" placeholder="Enter name..." class="form-control">
		@if($errors->first('name'))
		<span class="text-danger" style="color: red">{{$errors->first('name')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>Image</label>
		<input type="file" name="image" value="" class="form-control">
		@if($errors->first('image'))
		<span class="text-danger" style="color: red">{{$errors->first('image')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			@foreach ($cates as $ca)
				<option value="{{$ca->id}}"
					@if($ca->id == $model->category_id)
					selected
					@endif
				>{{$ca->name}}</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group">
		<label>price</label>
		<input type="text" name="price" rows="10" class="form-control" value="{{old('price', $model->price)}}">
		@if($errors->first('price'))
		<span class="text-danger" style="color: red">{{$errors->first('price')}}</span>
		@endif
	</div>

	<div class="form-group">
		<label>detail</label>
		<textarea name="detail" rows="10" class="form-control">{!! old('detail', $model->detail)!!}</textarea>
		@if($errors->first('detail'))
		<span class="text-danger"style="color: red">{{$errors->first('detail')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label>amount</label>
		<input type="text" name="amount" rows="10" class="form-control" value="{{old('amount', $model->amount)}}">
		@if($errors->first('amount'))
		<span class="text-danger"style="color: red">{{$errors->first('amount')}}</span>
		@endif
	</div>
	<div class="checkbox">
	    <label>
	    	<input type="checkbox"
	    		@if($model->status)
	    		checked 
	    		@endif	
	    	 name="status" value="1"> Enable
	    </label>
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-sm btn-info">Save</button>
		<a href="{{route('home')}}" title="" class="btn btn-sm btn-danger">Cancel</a>
	</div>
</form>

@endsection