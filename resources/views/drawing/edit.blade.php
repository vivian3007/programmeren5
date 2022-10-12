@extends('layouts.app')
@section('content')

    <form action="{{ route('drawing.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        @foreach($details as $detail)
            <h2>Edit - {{$detail->name}}</h2>
            <div>
                <label for="name">Title*</label><br>
                <input type="text" id="name" name="name" value="{{ $detail->name }}"><br>
                <span style="color:red">@error('name'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <label for="materials">Materials*</label><br>
                <input type="text" id="materials" name="materials" value="{{ $detail->materials }}"><br>
                <span style="color:red">@error('materials'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <label for="details">Details*</label><br>
                <input type="text" id="details" name="details" value="{{ $detail->details }}"><br><br>
            </div>
            <div>
                <input type="submit" class="btn btn-outline-dark" value="Edit">
            </div>
        @endforeach
    </form>

    <br><a href="{{ route('drawing.index') }}" class="btn btn-outline-dark">Go back</a>

@endsection
