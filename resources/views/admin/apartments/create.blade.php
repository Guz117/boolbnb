@extends('layouts.admin')

@section('content')
<div class="container p-5">
  <div class="row">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
  </div>
    <div class="row">
        <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
            <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="title" class="form-label text-uppercase fw-bold">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label text-uppercase fw-bold">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            @error('image')
                <div class="alert alert-danger mt-3"> {{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="price" class="form-label text-uppercase fw-bold">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="rooms" class="form-label text-uppercase fw-bold">Rooms</label>
            <input type="text" class="form-control" id="rooms" name="rooms" value="{{ old('rooms') }}">
            </div>
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="beds" class="form-label text-uppercase fw-bold">Beds</label>
            <input type="text" class="form-control" id="beds" name="beds" value="{{ old('beds') }}">
            </div>
            @error('beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="bathrooms" class="form-label text-uppercase fw-bold">Bathrooms</label>
            <input type="text" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
            </div>
            @error('bathrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('services.*')  
            <div class="alert alert-danger mt-3">
                {{ $message }}
            </div>
            @enderror
            <fieldset class="mb-3">
                <legend>Services</legend>
                @foreach ($services as $service)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="services[]"
                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $service->name }}
                        </label>
                </div>
                @endforeach
            </fieldset>
            <div class="mb-3">
                <label for="square" class="form-label text-uppercase fw-bold">Square</label>
            <input type="text" class="form-control" id="square" name="square" value="{{ old('square') }}">
            </div>
            @error('square')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="address" class="form-label text-uppercase fw-bold">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="latitude" class="form-label text-uppercase fw-bold">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
            </div>
            @error('latitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="longitude" class="form-label text-uppercase fw-bold">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
            </div>
            @error('longitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-check">
                <input class="form-check-input" type="radio" name="visible" id="available" value="1" checked>
                <label class="form-check-label" for="available">
                    Available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="visible" id="notAvailable" value="0">
                <label class="form-check-label" for="notAvailable">
                    Not Available
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection