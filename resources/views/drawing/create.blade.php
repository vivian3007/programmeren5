@extends('layouts.app')
@section('content')
    <form action="{{ route('drawing.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Title*</label><br>
            <input type="text" id="name" name="name"><br>
            <span style="color:red">@error('name'){{ $message }} @enderror</span><br>
        </div>
        <div>
            <label for="materials">Materials*</label><br>
            <input type="text" id="materials" name="materials"><br>
            <span style="color:red">@error('materials'){{ $message }} @enderror</span><br>
        </div>
        <div>
            <label for="category">Category*</label><br>
                <input type="radio" id="category" name="category">
                <label for="category">Category 1</label>
            <span style="color:red">@error('category'){{ $message }} @enderror</span><br>
        </div>
        <div>
            <label for="details">Details</label><br>
            <input type="text" id="details" name="details"><br><br>
        </div>
        <div>
            <input type="submit" class="btn btn-outline-dark" value="Submit">
        </div>
    </form>

    <br><a href="{{ route('user.index') }}" class="btn btn-outline-dark">Go back</a>
@endsection
