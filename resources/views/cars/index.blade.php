@extends('layouts.app')

@section('content')
<div class="container">
    <h1>list of cars</h1>
    
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col">release date</th>
            <th scope="col"></th> 
            <th scope="col"></th> 

            
          </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
          <tr>
            <td><a href="{{ route('cars.show',['car'=>$car->id]) }}">{{ $car->brand }}</a></td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->release_date }}</td>

             <td>
                 <a class="btn btn-warning" href="{{ route('cars.edit', ["car" => $car->id]) }}">
                    Edit
                 </a>
             </td>

            <td> <form style="display: inline" method="POST" action="{{ route('cars.destroy', ['car' => $car->id]) }}">
                @csrf
                @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
              </form> 
            </td> 

          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
@endsection