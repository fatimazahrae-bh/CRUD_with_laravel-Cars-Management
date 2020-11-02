@extends('layouts.app')

@section('content')
<h1>cars characteristic</h1>    

{{-- @if($car->image)
  <img src="{{ $car->image->url() }}" class="mt-3 img-fluid rounded" alt="">
@endif --}}

<h1>{{ $car->brand }}</h1>

   <img src="{{ Storage::url($car->image->path) ?? null }}"  
  class="mt-3 img-fluid rounded" alt="">  
    

{{-- <img src="http://localhost:8000/storage/{{ $car->image->path ?? null }}" alt=""> --}}

@endsection