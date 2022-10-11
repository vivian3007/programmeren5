@extends('layouts.app')
@section('content')

    <form action="{{ route('user.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        @foreach($details as $detail)
            <label for="name">Name*</label><br>
            <input type="text" id="name" name="name" value="{{ $detail->name }}"><br>
            <span style="color:red">@error('name'){{ $message }} @enderror</span><br>
            <label for="materials">Email*</label><br>
            <input type="text" id="materials" name="materials" value="{{ $detail->email }}"><br>
            <span style="color:red">@error('materials'){{ $message }} @enderror</span><br>
            <input type="submit" class="btn btn-outline-dark" value="Save">
        @endforeach
    </form>

    <br><a href="{{ route('user.show', $id) }}" class="btn btn-outline-dark">Go back</a>

@endsection
