@extends('layouts.app')
@section('content')
    <form action="{{ route('drawing.store') }}" method="POST">
        @csrf
        <label for="name">Title*</label><br>
        <input type="text" id="name" name="name"><br>
        <span style="color:red">@error('name'){{ $message }} @enderror</span><br>
        <label for="materials">Materials*</label><br>
        <input type="text" id="materials" name="materials"><br>
        <span style="color:red">@error('materials'){{ $message }} @enderror</span><br>
        <label for="details">Details</label><br>
        <input type="text" id="details" name="details"><br><br>
        <input type="submit" class="btn btn-outline-dark" value="Submit">
    </form>

    <br><a href="{{ route('drawing.index') }}" class="btn btn-outline-dark">Go back</a>
@endsection
