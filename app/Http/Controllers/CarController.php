<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    /**
     * ! Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        $data=[
            'cars' => $cars
        ];
        return view('cars.index', $data);
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
       $form_data = $request->all();

       $request->validate($this->validation());

       $new_car = new Car();
       $new_car->fill($form_data);
       $new_car->save();

       return redirect()->route('cars.show', ['car' => $new_car->id]);
    }

    /**
     * ! Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car_to_show = Car::findOrFail($id);

        $data =[
            'car_to_show' => $car_to_show
        ];
        return view('cars.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validation()
    {
        return [
            'brand' => 'required|max:50',
            'model' => 'required|max:50',
            'power' => 'required|max:50',
            'doors' => 'required',
            'power' => 'required|max:150'
        ];
    }
}
