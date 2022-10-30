@extends('layouts.app')
@section('content')

    <h2>Create a new category</h2>

    <form action="{{ route('drawing.storeCategory') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category name*</label><br>
            <input type="text" id="name" name="name"><br>
            <span style="color:red">@error('name'){{ $message }} @enderror</span><br>
        </div>
        <div>
            <input type="submit" class="btn btn-outline-dark" value="Submit">
        </div>
    </form>
@endsection
