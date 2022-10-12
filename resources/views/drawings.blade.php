@extends('layouts.app')
@section('content')

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Materials</th>
            <th>Details</th>
            <th>Image</th>
        </tr>
        @foreach($drawings as $drawing)
            <tr>
                <td>{{ $drawing->id }}</td>
                <td>{{ $drawing->name }}</td>
                <td>{{ $drawing->materials }}</td>
                <td>{{ $drawing->details }}</td>
                <td>{{ $drawing->image }}</td>
            </tr>
        @endforeach
    </table>
@endsection
