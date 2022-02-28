@extends('layouts.app')

@section('main_content')

<div class="container">

    <div class="card" style="width: 18rem;">    
        <img src="{{ $car_to_show->thumb }}" class="card-img-top" alt="{{ $car_to_show->brand }}">
        <div class="card-body">
            <h5 class="card-title">{{ $car_to_show->brand }} {{ $car_to_show->model }}</h5>
            <p class="card-text">Potenza: {{ $car_to_show->power }}</p>
            <p class="card-text">Numero di porte: {{ $car_to_show->doors }}</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.cars.edit', ['car'=>$car_to_show->id]) }}">Modifica</a>
        <form action="{{ route('admin.cars.destroy', ['car'=> $car_to_show->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Cancella</button>
        </form>
    </div>
</div>
@endsection