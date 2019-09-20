{{-- {{$age}} - {{$name}}
<br>
{{$str}}
<br>
{!!$str!!}
<br>
@if($age>50)
<h4>Ông {{$name}} sắp tèo </h4>
@else
<h4>Ông {{$name}} còn lâu mới tèo </h4>
@endif
@for($i=0; $i < $age; $i++)
<h4>{{$key}} ---{{$value}}</h4>
@endforeach --}}

{{-- @each('item', $arr, 'xx') --}}
@extends('layouts.main')
@section('content')

@endsection