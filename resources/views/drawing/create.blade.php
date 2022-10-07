@extends('layouts.app')
@section('content')
    <form action="{{ route('drawing.store') }}" method="POST">
        @csrf
        <label for="name">Title:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="materials">Materials:</label>
        <input type="text" id="materials" name="materials"><br><br>
        <label for="details">Details:</label>
        <input type="text" id="details" name="details"><br><br>
        <input type="submit" value="Submit">
    </form>
@endsection
