@extends('layouts.app')
@section('content')

    @foreach($users as $user)
        <ul>
            <li>{{ $user->id }}</li>
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
        </ul>
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-dark">Edit</a>
    @endforeach

@endsection
