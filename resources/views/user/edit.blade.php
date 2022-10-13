@extends('layouts.app')
@section('content')

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div>
                <label for="name">Name*</label><br>
                <input type="text" id="name" name="name" value="{{ $user->name }}"><br>
                <span style="color:red">@error('name'){{ $message }} @enderror</span>
            </div>
            <div>
                <label for="email">Email*</label><br>
                <input type="text" id="email" name="email" value="{{ $user->email }}"><br>
                <span style="color:red">@error('email'){{ $message }} @enderror</span><br>
            </div>
            <div>
                <input type="submit" class="btn btn-outline-dark" value="Save">
            </div>
    </form>

    <br><a href="{{ route('user.show', $id) }}" class="btn btn-outline-dark">Go back</a>

@endsection
