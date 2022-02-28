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

        <div class="form-group">
            <label for="thumb">Thumb</label>
            <input type="text" class="form-control" name="thumb" id="thumb" placeholder="thumb" value="{{ old('thumb') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Crea</button>
    
    </form>
</div>

@endsection