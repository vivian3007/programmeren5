@extends('layouts.app')
@section('content')

    @foreach($details as $detail)
        <h2>Details - {{$detail->name}}</h2>

        <ul>
            <li>{{ $detail->id }}</li>
            <li>{{ $detail->name }}</li>
            <li>{{ $detail->materials }}</li>
            <li>{{ $detail->details }}</li>
            <li>{{ $detail->image }}</li>
        </ul>
    @endforeach

    <br><a href="{{ route('drawing.index') }}" class="btn btn-outline-dark">Go back</a>

@endsection
