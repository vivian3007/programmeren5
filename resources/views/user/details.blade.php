@extends('layouts.app')
@section('content')
    <h2>Account details - {{ $user->name }}</h2>
            <ul>
                <li>Name: {{ $user->name }}</li>
                <li>Email adress: {{ $user->email }}</li>
            </ul>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-dark">Edit</a>
@endsection
