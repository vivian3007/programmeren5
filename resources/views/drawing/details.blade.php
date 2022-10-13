@extends('layouts.app')
@section('content')
        <h2>Details - {{$details->name}}</h2>

        <ul>
            <li>{{ $details->id }}</li>
            <li>{{ $details->name }}</li>
            <li>{{ $details->materials }}</li>
            <li>{{ $details->details }}</li>
            <li>{{ $details->image }}</li>
        </ul>
    <br><a href="{{ route('drawing.index') }}" class="btn btn-outline-dark">Go back</a>

@endsection
