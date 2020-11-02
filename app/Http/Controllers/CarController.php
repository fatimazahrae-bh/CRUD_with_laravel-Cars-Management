<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCar;
use App\Models\Car;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::all();
        return view('cars.index',['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $car = Car::create($request->only(['brand','model','release_date'])); 
        
        $data = $request->only(['brand','model','release_date']);
        
        $data['user_id'] = Auth::user()->id;
        $car = Car::create($data);

        if($request->hasFile('picture')){
            $path = $request->file('picture')->store('cars');
            $image = new Image(['path' => $path]);
            $car->image()->save($image);
        }

        $request->session()->flash('status','car was created');
        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cars.show',[
            'car' => Car::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        if($request->hasFile('picture')) {

            $path = $request->file('picture')->store('cars');

                if($car->image) {
                  Storage::delete($car->image->path);
                  $car->image->path = $path;
                  $car->image->save();
                }
                else {
                    $car->image()->save(Image::make(['path' => $path]));
                }
      }

        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->release_date = $request->input('release_date');

        $car->save();
        $request->session()->flash('status','car was updated');
        return redirect()->route('cars.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $car = Car::findOrFail($id);
        
        $car->image->delete();

        $car->delete();
        $request->session()->flash('status','car was deleted');
        return redirect()->route('cars.index');
    }
}
