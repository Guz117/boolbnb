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
        <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data" id="MyForm">
            <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="title" class="form-label text-uppercase fw-bold">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <p id="demo1"></p>
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
            <p id="demo2"></p>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="rooms" class="form-label text-uppercase fw-bold">Rooms</label>
            <input type="text" class="form-control" id="rooms" name="rooms" value="{{ old('rooms') }}">
            </div>
            <p id="demo3"></p>
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="beds" class="form-label text-uppercase fw-bold">Beds</label>
            <input type="text" class="form-control" id="beds" name="beds" value="{{ old('beds') }}">
            </div>
            <p id="demo4"></p>
            @error('beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="bathrooms" class="form-label text-uppercase fw-bold">Bathrooms</label>
            <input type="text" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
            </div>
            <p id="demo5"></p>
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
            <p id="demo6"></p>
            @error('square')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="address" class="form-label text-uppercase fw-bold">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <p id="demo7"></p>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="latitude" class="form-label text-uppercase fw-bold">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
            </div>
            <p id="demo8"></p>
            @error('latitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="longitude" class="form-label text-uppercase fw-bold">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
            </div>
            <p id="demo9"></p>
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


            <button type="button" class="btn btn-primary" onclick="validationForm()" value="Submit form">Save</button>
        </form>
    </div>
</div>

<script>
function validationForm() {
    let title = document.getElementById('title').value;
    let price = document.getElementById('price').value;
    let rooms = document.getElementById('rooms').value;
    let beds = document.getElementById('beds').value;
    let bathrooms = document.getElementById('bathrooms').value;
    let square = document.getElementById('square').value;
    let address = document.getElementById('address').value;
    let latitude = document.getElementById('latitude').value;
    let longitude = document.getElementById('longitude').value;
    
    document.getElementById('demo2').innerHTML = null;
    let message = "";
    let error = 0;

    if (!title || !title.trim()) {
        message = 'title not valid';
        error = 1;
        document.getElementById('demo1').innerHTML = message;
    } 

    if (price < 0 || !price || isNaN(price)) {
        message = 'price not valid';
        error = 1;
        price = "";
        document.getElementById('demo2').innerHTML = message;
    }
    if (rooms < 0 || !rooms || isNaN(rooms)) {
        message = 'Rooms must be at least one';
        error = 1;
        rooms = "";
        document.getElementById('demo3').innerHTML = message;
    }
    if (beds < 0 || !beds || isNaN(beds)) {
        message = 'Beds must be at least one';
        error = 1;
        beds = "";
        document.getElementById('demo4').innerHTML = message;
    }
    if (bathrooms < 0 || !bathrooms || isNaN(bathrooms)) {
        message = 'Bathrooms must be at least one';
        error = 1;
        bathrooms = "";
        document.getElementById('demo5').innerHTML = message;
    }
    if (square < 0 || !square || isNaN(square)) {
        message = 'Square not valid';
        error = 1;
        square = "";
        document.getElementById('demo6').innerHTML = message;
    }
    if (!address || !address.trim()) {
        message = 'Address not valid';
        error = 1;
        address = "";
        document.getElementById('demo7').innerHTML = message;
    }
    if (latitude < -90 || latitude > 90 || !latitude ) {
        message = 'Latitude not valid';
        error = 1;
        latitude = "";
        document.getElementById('demo8').innerHTML = message;
    }
    if (longitude < -180 || longitude > 180 || !longitude ) {
        message = 'Longitude not valid';
        error = 1;
        longitude = "";
        document.getElementById('demo9').innerHTML = message;
    }
    if (error == 0) {
        message = "";
        document.getElementById('MyForm').submit();
        return true;
    } else {
        return false;
    }
}
</script>
@endsection