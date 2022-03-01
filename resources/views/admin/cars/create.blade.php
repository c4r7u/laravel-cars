@extends('layouts.app')

@section('main_content')
    
<div class="container">

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
    
    {{-- Form car creation --}}
    <form action="{{ route('admin.cars.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="brand">Brand</label>
          <input type="text" class="form-control" name="brand" id="brand" placeholder="brand" value="{{ old('brand') }}">
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" id="model" placeholder="model" value="{{ old('model') }}">
        </div>

        <div class="form-group">
            <label for="power">Power</label>
            <input type="text" class="form-control" name="power" id="power" placeholder="power" value="{{ old('power') }}">
        </div>

        <div class="form-group">
            <label for="doors">Doors</label>
            <input type="number" class="form-control" name="doors" id="doors" placeholder="doors" value="{{ old('doors') }}">
        </div>

        {{-- Categories select --}}
        <div class="form-group">
            <label for="category_id">Categories</label>
            <select name="category_id" id="category_id">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Optionals --}}
        <h5>Optionals</h5>
        @foreach ($optionals as $optional)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $optional->id }}" id="optional-{{ $optional->id }}" name="optionals[]">
                <label class="form-check-label" for="optional-{{ $optional->id }}">{{ $optional->name }}</label>
            </div>
        @endforeach

        <div class="form-group">
            <label for="thumb">Thumb</label>
            <input type="text" class="form-control" name="thumb" id="thumb" placeholder="thumb" value="{{ old('thumb') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Crea</button>
    
    </form>
</div>

@endsection