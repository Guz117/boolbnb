@extends('layouts.admin')

@section('content')
<div class="container show p-5">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col">
             <h1>{{ $apartment->title }}</h1>
             <img src="{{$apartment->image}}" alt="{{$apartment->title}}" class="img-fluid">
             <h3>{{ $apartment->address }}</h3>
             <h3>Price: {{ $apartment->price }}&euro;</h3>
             <h3>Rooms: {{ $apartment->rooms }}</h3>
             <h3>Bathrooms: {{ $apartment->bathroom }}</h3>
             <h3>Square: {{ $apartment->square }}m<sup>3</sup></h3>
             <h3>Latitude: {{ $apartment->latitude }}</h3>
             <h3>Longitude: {{ $apartment->longitude }}</h3>
        </div>
    </div>
    <div class="col">
        {{-- <img class="img-fluid" src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->title }}"> --}}
    </div>
    <a class="btn btn-primary mt-5" href="{{url()->previous()}}">CANCEL</a>
    <a class="btn btn-primary mt-5" href="{{ route('admin.apartments.index') }}">HOME</a>
</div>
@endsection