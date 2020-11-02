@extends('layouts.app')


@section('content')
<div class="container">
<h1>edit car</h1>
<form method="POST" action="{{ route('cars.update', ['car' => $car->id]) }}" enctype="multipart/form-data">
     @csrf {{-- pour gerer le token     --}}
     @method('PUT')
    
     @include('cars.form')

    <button class="btn btn-block btn-warning" type="submit">updat car</button>
</form>
</div>

@endsection 