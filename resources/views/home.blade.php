@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h1>Drawing collection</h1>
    <p>This website is a collection of drawings. Feel free to add some!</p>
    <img src="{{ asset("images/funland.jpg") }}" alt="mermaid" style="width:60%;">
@endsection
