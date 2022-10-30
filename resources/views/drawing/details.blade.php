@extends('layouts.app')
@section('content')
        <h2>Details - {{$drawing->name}}</h2>

        <table class="table">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Materials</th>
                <th>Category</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><img src="{{ asset("images/$drawing->image") }}" alt="mermaid" style="height:100px;"></td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->category->name }}</td>
                <td>{{ $drawing->details }}</td>
            </tr>
        </table>

        <br><a href="{{ route('user.index') }}" class="btn btn-outline-dark">Go to my collection</a><br>
        <br><a href="{{ route('drawing.index') }}" class="btn btn-outline-dark">Go to the drawings overview</a>
@endsection
