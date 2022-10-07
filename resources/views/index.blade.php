@extends('layouts.app')
@section('content')
    <a href="{{ route('drawing.create') }}">Create a new drawing</a>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Materials</th>
            <th>Details</th>
            <th>Image</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            @foreach($drawings as $drawing)
                <td>{{ $drawing->id }}</td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->details }}</td>
                <td>{{ $drawing->image }}</td>
                <td><a href="drawing/{{ $drawing->id }}">Details</a></td>
                <td><a href="drawing.blade.php">Edit</a></td>
                <td><a href="drawing.blade.php">Delete</a></td>
            @endforeach
        </tr>
    </table>
@endsection
