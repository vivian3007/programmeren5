@extends('layouts.app')
@section('content')

    <form action="{{ route('drawing.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        @foreach($details as $detail)
        <label for="name">Title:</label>
        <input type="text" id="name" name="name" value="{{ $detail->name }}"><br><br>
        <label for="materials">Materials:</label>
        <input type="text" id="materials" name="materials" value="{{ $detail->materials }}"><br><br>
        <label for="details">Details:</label>
        <input type="text" id="details" name="details" value="{{ $detail->details }}"><br><br>
        <input type="submit" value="Edit">
        @endforeach
    </form>

    <br><a href="/index">Go back</a>

@endsection
