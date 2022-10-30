@extends('layouts.app')
@section('content')

        <h2>Add a new drawing</h2>

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
                @foreach($categories as $category)
                    <input type="radio" id="category" name="category" value="{{$category->id}}">
                    <label for="category">{{$category->name}}</label><br>
                @endforeach
                <span style="color:red">@error('category'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <label for="details">Details</label><br>
                <input type="text" id="details" name="details"><br><br>
            </div>
            <div>
                <label for="image">Image*</label><br>
                <input type="text" id="image" name="image" placeholder="Name of the image"><br>
                <span style="color:red">@error('image'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <input type="submit" class="btn btn-outline-dark" value="Submit">
            </div>
        </form>
@endsection
