<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Car;
use App\Category;
use App\Optional;
use App\Http\Controllers\Controller;

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
        return view('admin.cars.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $optionals = Optional::all();

        return view('admin.cars.create', compact('categories', 'optionals'));
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

       if ($form_data['optionals']) {
           $new_car->optionals()->sync($form_data['optionals']);
       } else {
            $new_car->optionals()->sync([]);
       }

       return redirect()->route('admin.cars.show', ['car' => $new_car->id]);
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
        return view('admin.cars.show', $data);
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
        $categories = Category::all();
        $optionals = Optional::all();

        return view('admin.cars.edit', compact('car', 'categories', 'optionals'));
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
        $form_data = $request->all();
        $request->validate($this->validation());

        $car_to_update = Car::findOrFail($id);
        $car_to_update->update($form_data);

        if (isset($form_data['optionals'])) {
            $car_to_update->optionals()->sync($form_data['optionals']);
        } else {
             $car_to_update->optionals()->sync([]);
        }

        return redirect()->route('admin.cars.show', ['car'=> $car_to_update->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_to_delete = Car::findOrFail($id);

        $car_to_delete->optionals()->sync([]);

        $car_to_delete->delete();

        return redirect()->route('admin.cars.index');
    }

    protected function validation()
    {
        return [
            'brand' => 'required|max:50',
            'model' => 'required|max:50',
            'power' => 'required|max:50',
            'doors' => 'required',
            'power' => 'required|max:150',
            'category_id' => 'exists:categories,id|nullable',
            'optionals' => 'exists:optionals,id|nullable'
        ];
    }
}
