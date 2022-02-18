@extends('layouts.app')

@section('main_content')
    <div class="card" style="width: 18rem;">    
        <img src="{{ $car_to_show->thumb }}" class="card-img-top" alt="{{ $car_to_show->brand }}">
        <div class="card-body">
            <h5 class="card-title">{{ $car_to_show->brand }} {{ $car_to_show->model }}</h5>
            <p class="card-text">Potenza: {{ $car_to_show->power }}</p>
            <p class="card-text">Numero di porte: {{ $car_to_show->doors }}</p>
        </div>
    </div>
@endsection