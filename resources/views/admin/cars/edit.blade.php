@extends('layouts.app')

@section('main_content')

<div class="container">

    <h2>Aggiorna i dati</h2>

    {{-- Required fields --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cars.update', ['car'=> $car->id]) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
          <label for="brand">Brand</label>
          <input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand', $car->brand) }}">
        </div>
    
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" id="model" value="{{ old('model', $car->model)}}">
        </div>
    
        <div class="form-group">
            <label for="power">Power</label>
            <input type="text" class="form-control" name="power" id="power" value="{{ old('power', $car->power) }}">
        </div>
    
        <div class="form-group">
            <label for="doors">Doors</label>
            <input type="number" class="form-control" name="doors" id="doors"  value="{{ old('doors', $car->doors) }}">
        </div>

        {{-- Categories select --}}
        <div class="form-group">
            <label for="category_id">Categories</label>
            <select name="category_id" id="category_id">
                <option value=""></option>
                @foreach ($categories as $category)
                    @if (!$errors->any())
                        <option value="{{ $category->id }}" {{$car->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        {{-- Optionals --}}
        <h5>Optionals</h5>
        @foreach ($optionals as $optional)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $car->optionals->contains($optional) ? 'checked' : '' }} value="{{ $optional->id }}" id="optional-{{ $optional->id }}" name="optionals[]">
                <label class="form-check-label" for="optional-{{ $optional->id }}">{{ $optional->name }}</label>
            </div>
        @endforeach
    
        <div class="form-group">
            <label for="thumb">Thumb</label>
            <input type="text" class="form-control" name="thumb" id="thumb"  value="{{ old('thumb', $car->thumb) }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    
    </form>
</div>


@endsection