@extends('layouts.app')

@section('main_content')
<div class="container">
    @forelse ($cars as $car)
        <div class="card m-3" style="width: 18rem;">
            <a href="{{route('admin.cars.show' , ['car' => $car->id])}}">
                <img src="{{ $car->thumb }}" class="card-img-top" alt="{{ $car->brand }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
            </div>
        </div>
    @empty
        <h1>Non ci sono macchine</h1>
    @endforelse

</div>
@endsection