@extends('layouts.admin')

@section('content')
<div class="row">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
</div>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase">Edit apartment: {{ $apartment->title }}</h2>
                <a class="btn btn-primary" href="{{route('admin.apartments.index')}}">HOME</a>
                <a class="btn btn-primary" href="{{route('admin.apartments.show', $apartment)}}">VIEW</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.apartments.update', $apartment->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        <div class="mb-3">
                            <label for="title" class="form-label text-uppercase fw-bold">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $apartment->title }}">
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @if (!empty($apartment->image))
                        <div class="mb-3">
                            <img class="img-fluid" src="{{ asset('storage/' . $apartment->image) }}"
                            alt="{{ $apartment->title }}">
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="price" class="form-label text-uppercase fw-bold">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $apartment->price }}">
                        </div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="rooms" class="form-label text-uppercase fw-bold">Rooms</label>
                            <textarea type="text-area" class="form-control" id="rooms" name="rooms" row="5">{{ $apartment->rooms }}</textarea>
                        </div>
                        @error('rooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="beds" class="form-label text-uppercase fw-bold">Beds</label>
                            <textarea type="text-area" class="form-control" id="beds" name="beds" row="5">{{ $apartment->beds }}</textarea>
                        </div>
                        @error('beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="bathrooms" class="form-label text-uppercase fw-bold">Bathrooms</label>
                            <textarea type="text-area" class="form-control" id="bathrooms" name="bathrooms" row="5">{{ $apartment->bathrooms }}</textarea>
                        </div>
                        @error('beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('services.*')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                        <fieldset class="mb-3">
                            <legend>Services</legend>
                            @if ($errors->any())
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="services[]"
                                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $service->name }}
                                    </label>
                                </div>
                            @endforeach
                            @else
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="services[]"
                                        {{ $apartment->services()->get()->contains($service->id)? 'checked': '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $service->name }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        </fieldset>
                        <div class="mb-3">
                            <label for="square" class="form-label text-uppercase fw-bold">Square</label>
                            <textarea type="text-area" class="form-control" id="square" name="square" row="5">{{ $apartment->square }}</textarea>
                        </div>
                        @error('square')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="address" class="form-label text-uppercase fw-bold">Address</label>
                            <textarea type="text-area" class="form-control" id="address" name="address" row="5">{{ $apartment->address }}</textarea>
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="latitude" class="form-label text-uppercase fw-bold">Latitude</label>
                            <textarea type="text-area" class="form-control" id="latitude" name="latitude" row="5">{{ $apartment->latitude }}</textarea>
                        </div>
                        @error('latitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="longitude" class="form-label text-uppercase fw-bold">Longitude</label>
                            <textarea type="text-area" class="form-control" id="longitude" name="longitude" row="5">{{ $apartment->longitude }}</textarea>
                        </div>
                        @error('longitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visible" id="available" value="1"
                            {{ $apartment->visible == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="available">
                                Available
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visible" id="notAvailable" value="0"
                            {{ $apartment->visible == false ? 'checked' : '' }}>
                            <label class="form-check-label" for="notAvailable">
                                Not Available
                            </label>
                        </div>
                    </div>   
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection