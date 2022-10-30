@extends('layouts.app')
@section('content')

    <h2>Edit - {{ $drawing->name }}</h2>

    <form action="{{ route('drawing.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
            <div>
                <label for="name">Title*</label><br>
                <input type="text" id="name" name="name" value="{{ $drawing->name }}"><br>
                <span style="color:red">@error('name'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <label for="materials">Materials*</label><br>
                <input type="text" id="materials" name="materials" value="{{ $drawing->materials }}"><br>
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
                <label for="details">Details*</label><br>
                <input type="text" id="details" name="details" value="{{ $drawing->details }}"><br><br>
            </div>
            <div>
                <label for="image">Image*</label><br>
                <input type="text" id="image" name="image" placeholder="Name of the image" value="{{ $drawing->image }}"><br>
                <span style="color:red">@error('image'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <input type="submit" class="btn btn-outline-dark" value="Edit">
            </div>
    </form>

    <br><a href="{{ route('user.index') }}" class="btn btn-outline-dark">Go back</a>

@endsection
