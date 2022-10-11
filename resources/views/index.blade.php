@extends('layouts.app')
@section('content')

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
            @foreach($drawings as $drawing)
                <tr>
                    <td>{{ $drawing->id }}</td>
                    <td>{{ $drawing->name }}</td>
                    <td>{{ $drawing->materials }}</td>
                    <td>{{ $drawing->details }}</td>
                    <td>{{ $drawing->image }}</td>
                    <td><a href="{{ route('drawing.show', $drawing->id) }}" class="btn btn-outline-dark">Details</a></td>
                    <td><a href="{{ route('drawing.edit', $drawing->id) }}" class="btn btn-outline-dark">Edit</a></td>
                    <td>
                        <form action="/drawing/{{ $drawing->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
    <a href="{{ route('drawing.create') }}" class="btn btn-outline-dark">Create a new drawing</a>
@endsection
