@php
    /**
     * @var \App\Models\Drawing[] $drawings
     */
@endphp

@extends('layouts.app')
@section('content')

    <h2>My collection</h2>

    <table class="table">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Materials</th>
            <th>Category</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
            @foreach($drawings as $drawing)
                <tr>
                    <td><img src="{{ asset("images/$drawing->image") }}" alt="mermaid" style="height:100px;"></td>
                    <td>{{ $drawing->name }}</td>
                    <td>{{ $drawing->materials }}</td>
                    <td>{{ $drawing->category->name }}</td>
                    <td>{{ $drawing->details }}</td>
                    <td><a href="{{ route('drawing.show', $drawing->id) }}" class="btn btn-outline-dark">Details</a></td>
                    <td><a href="{{ route('drawing.edit', $drawing->id) }}" class="btn btn-outline-dark">Edit</a></td>
                    <td>
                        <form action="{{route('drawing.destroy', $drawing->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('drawing.active', $drawing) }}" method="post">
                            @csrf
                            @if($drawing->active)
                                <button class="btn btn-outline-dark" type="submit">Active</button>
                            @else
                                <button class="btn btn-outline-dark" type="submit">Not active</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection
