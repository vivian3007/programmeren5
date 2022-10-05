@extends('layouts.app')
@section('content')
    <a href="/drawings">index page</a>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Materials</th>
            <th>Details</th>
            <th>Image</th>
        </tr>
        <tr>
            @foreach($drawings as $drawing)
                <td>{{ $drawing->id }}</td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->details }}</td>
                <td>{{ $drawing->image }}</td>
            @endforeach
        </tr>
    </table>
@endsection
