@extends('layouts.app')

@section('content')
<div class="container">
    <h1>new car</h1>
    
  <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
    @csrf

  @include('cars.form')
  
  <button  class="btn btn-block btn-primary" type="submit">Add car</button>
</form>
</div> 
@endsection